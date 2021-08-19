<?php

namespace App\Http\Controllers;

use App\ConselhoInformacao;
use App\ConselhoCategoria;
use Illuminate\Http\Request;
use Log;


class ConselhoInformacaoController extends Controller
{
    public function index(Request $request)
    {
        $informacoes = ConselhoInformacao::with('categoria')->where('situacao', 1)->get();
        //dd($informacoes);
        if (isApi()) {
            return retorno($informacoes, 200);
        }

        return view('conselho.informacao.index', compact('informacoes'));
    }

    public function create()
    {
        $categorias = ConselhoCategoria::get();
        return view('conselho.informacao.create-edit', compact('categorias'));
    }

    public function store(Request $request)
    {
        $dados = $request->all();

        $validate = validator($dados, ConselhoInformacao::rules());
        if ($validate->fails()) {
            $messages = $validate->messages();
            return retorno($messages, 500);
        }
        $categoria = ConselhoCategoria::find($dados['conselho_categoria_id']);

        if (!$categoria) {
            return retorno('Categoria não encontrada', 404);
        }

        $informacao = ConselhoInformacao::create($dados);

        Log::info("Novo ConselhoInformacao [$informacao->id] criado por " .  user_name());

        return retorno('Informação incluída', 200, '/conselho-informacao');
    }

    public function show(Request $request, $id)
    {
        $informacao = ConselhoInformacao::find($id);
        if (!$informacao) {
            return retorno('ConselhoInformacao não encontrado', 404);
        }

        if (isApi()) {
            return retorno($informacao, 200);
        }

        return view('conselho.informacao.show', compact('informacao'));
    }


    public function edit(Request $request, $id)
    {
        $informacao = ConselhoInformacao::find($id);

        return view('conselho.informacao.create-edit', compact('informacao'));
    }

    public function update(Request $request, $id)
    {
        $informacao = ConselhoInformacao::find($id);

        if (!$informacao) {
            return retorno('ConselhoInformacao não encontrado', 404);
        }
        $dados = $request->all();
        $validate = validator($dados, ConselhoInformacao::rulesUpdate());
        if ($validate->fails()) {
            $messages = $validate->messages();
            return retorno($messages, 500);
        }
        if (!$informacao->update($request->all())) {
            return retorno('Não foi possivel alterar a ConselhoInformacao', 500);
        }
        Log::info("informacao código: [$id] alterado por " .  user_name());

        return retorno('Informação alterada', 200);
    }

    public function destroy(Request $request, $id)
    {
        $informacao = ConselhoInformacao::find($id);
        if (!$informacao) {
            return retorno('ConselhoInformacao não encontrado', 404);
        }
        if (!$informacao->delete()) {
            return retorno('Não foi possivel excluir o ConselhoInformacao', 500);
        }
        Log::info("ConselhoInformacao código: [$id] exclída por " .  user_name());

        return retorno('Informação excluída', 200, '/conselho-informacao');
    }
}
