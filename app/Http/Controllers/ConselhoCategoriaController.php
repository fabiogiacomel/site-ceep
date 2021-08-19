<?php

namespace App\Http\Controllers;

use App\ConselhoCategoria;
use Illuminate\Http\Request;
use Log;

class ConselhoCategoriaController extends Controller
{
    public function index(Request $request)
    {
        $categorias = ConselhoCategoria::get();

        if (isApi()) {
            return retorno($categorias, 200);
        }

        return view('conselho.categoria.index', compact('categorias'));
    }

    public function create()
    {
        return view('conselho.categoria.create-edit');
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $validate = validator($dados, ConselhoCategoria::rules());
        if ($validate->fails()) {
            $messages = $validate->messages();
            return retorno($messages, 500);
        }
        $categoria = ConselhoCategoria::create($dados);

        Log::info("Novo ConselhoCategoria [$categoria->id] criado por " .  user_name());

        return retorno('Categoria incluída', 200, '/conselho-categoria');
    }

    public function show(Request $request, $id)
    {
        $categoria = ConselhoCategoria::find($id);
        if (!$categoria) {
            return retorno('categoria não encontrado', 404);
        }

        if (isApi()) {
            return retorno($categoria, 200);
        }

        return view('conselho-categoria.show', compact('categoria'));
    }


    public function edit(Request $request, $id)
    {
        $categoria = ConselhoCategoria::find($id);

        return view('conselho-categoria.create-edit', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = ConselhoCategoria::find($id);

        if (!$categoria) {
            return retorno('ConselhoCategoria não encontrado', 404);
        }
        $dados = $request->all();
        $validate = validator($dados, ConselhoCategoria::rulesUpdate());
        if ($validate->fails()) {
            $messages = $validate->messages();
            return retorno($messages, 500);
        }
        if (!$categoria->update($request->all())) {
            return retorno('Não foi possivel alterar a ConselhoCategoria', 500);
        }
        Log::info("categoria código: [$id] alterado por " .  user_name());

        return retorno('Categoria alterada', 200);
    }

    public function destroy(Request $request, $id)
    {
        $categoria = ConselhoCategoria::find($id);

        if (!$categoria) {
            return retorno('categoria não encontrado', 404);
        }
        if (!$categoria->delete()) {
            return retorno('Não foi possivel excluir o categoria', 500);
        }
        Log::info("categoria código: [$id] exclída por " .  user_name());

        return retorno('Categoria excluída', 200, '/conselho-categoria');
    }
}
