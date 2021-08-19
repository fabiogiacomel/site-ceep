<?php
namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use App\Models\Curso;
use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{
    public function index()
    {
        $curso = Curso::all();
        //return response()->json(['status' => 'success','message' => $curso], 200);
        return view('curso.home', compact('curso'));
    }

    public function show($id)
    {
        $curso = Curso::find($id);
        if (!$curso = Curso::find($id)) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Informação não encontrada',
                ],
                404
            );
        }

        //return response()->json(['status' => 'success','message' => $curso], 200);
        return view('curso.show', compact('curso'));
    }

    public function update(CursoRequest $request, $id)
    {
        $curso = Curso::find($id);
        $curso->update($request->all());
        // return response()->json($curso);
        return redirect()->action('CursoController@index')->withInput($request->only('nome'));
    }

    public function store(CursoRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $curso = Curso::create($data);
        //return response()->json($curso);
        return redirect()->action('CursoController@index')->withInput($request->only('nome'));
    }

    public function destroy($id)
    {
        $curso = Curso::find($id);
        $curso->delete();
        //return response()->json($curso);
        return redirect()->action('CursoController@index');
    }

    public function create()
    {$curso = null;
        return view('curso.create-edit', compact('curso'));
    }

    public function edit($id)
    {
        $curso = Curso::find($id);
        if (empty($curso)) {
            return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
        }
        //return response()->json($curso);
        return view('curso.create-edit', compact('curso'));
    }
}
