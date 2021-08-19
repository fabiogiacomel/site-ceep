<?php
namespace App\Http\Controllers;

use App\Http\Requests\Livro_registroRequest;
use App\Models\Livro_registro;
use Illuminate\Support\Facades\Auth;

class Livro_registroController extends Controller
{
    public function index()
    {
        $livro_registro = Livro_registro::all();
        //return response()->json(['status' => 'success','message' => $livro_registro], 200);
        return view('livro_registro.home', compact('livro_registro'));
    }

    public function show($id)
    {
        $livro_registro = Livro_registro::find($id);
        if (!$livro_registro = Livro_registro::find($id)) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Informação não encontrada',
                ],
                404
            );
        }

        //return response()->json(['status' => 'success','message' => $livro_registro], 200);
        return view('livro_registro.show', compact('livro_registro'));
    }

    public function update(Livro_registroRequest $request, $id)
    {
        $livro_registro = Livro_registro::find($id);
        $livro_registro->update($request->all());
        // return response()->json($livro_registro);
        return redirect()->action('Livro_registroController@index')->withInput($request->only('nome'));
    }

    public function store(Livro_registroRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['modalidade'] = 1;
        $livro_registro = Livro_registro::create($data);
        //return response()->json($livro_registro);
        return redirect()->action('Livro_registroController@index')->withInput($request->only('nome'));
    }

    public function destroy($id)
    {
        $livro_registro = Livro_registro::find($id);
        $livro_registro->delete();
        //return response()->json($livro_registro);
        return redirect()->action('Livro_registroController@index');
    }

    public function create()
    {$livro_registro = null;
        return view('livro_registro.create-edit', compact('livro_registro'));
    }

    public function edit($id)
    {
        $livro_registro = Livro_registro::find($id);
        if (empty($livro_registro)) {
            return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
        }
        //return response()->json($livro_registro);
        return view('livro_registro.create-edit', compact('livro_registro'));
    }
}
