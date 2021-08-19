<?php

namespace App\Http\Controllers;

use App\Models\Biblioteca;
use App\Models\Curso;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BibliotecaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dados = $request->all();
        
        if(isset($dados['titulo'])){
            $documentos = Biblioteca::with('curso2')->where('titulo', 'like', '%' . $dados['titulo'] . '%')->where('situacao', '1')->get();
        }else{
            $documentos = Biblioteca::with('curso2')->where('situacao', '1')->get();
        }
        return view('biblioteca.index', compact('documentos'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curso = Curso::orderBy('nome')->get();
        return view('biblioteca.create-edit', compact('curso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();

        $dados['user_id'] = Auth::id() ? Auth::id() : 1; 

        $series = array(
                '1' => "1_ANO",
                '2' => "2_ANO",
                '3' => "3_ANO",
                '4' => "4_ANO",
                '5' => "1_SEM",
                '6' => "2_SEM",
                '7' => "3_SEM",
                '8' => "4_SEM"
        );

        if ($request->hasFile('arquivo')) {
            $ext = $request->file('arquivo')->getClientOriginalExtension();
            $file_name  = $dados['titulo'] . '_' . substr(md5(date("dmYHis")), 0, 5) .'.'. $ext;
            //dd($file_name);
            $path = $request->file('arquivo')->storeAs('ceep/biblioteca', $file_name);
            //dd(Storage::url($path));
            $url = Storage::url($path);
            $dados['arquivo'] = $url;
        }

            //dd($dados);
            $documento = Biblioteca::create($dados);

            //toastr()->success('Planejamento criada com sucesso!');
            //dd($planejamento);
            return redirect('/biblioteca/1');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biblioteca  $biblioteca
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_usuario = Usuario::where('usuario', Auth::user()->email)->first();
        //$id_usuario = 1;

        //Pega os planejamentos do banco de dado novo
        $documentos = Biblioteca::with('curso2')->where('situacao', '1')->where('user_id', $id_usuario)->get();
        //dd($documentos);
        return view('biblioteca.show', compact('documentos')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Biblioteca  $biblioteca
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documento = Biblioteca::find($id);
        $curso = Curso::orderBy('nome')->get();

        return view('biblioteca.create-edit', compact('documento',  'curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Biblioteca  $biblioteca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $documento = Biblioteca::find($id);
        $dados = $request->all();

        if ($request->hasFile('arquivo')) {
            $ext = $request->file('arquivo')->getClientOriginalExtension();
            $file_name  = $dados['titulo'] . '_' . substr(md5(date("dmYHis")), 0, 5) .'.'. $ext;
            //dd($file_name);
            $path = $request->file('arquivo')->storeAs('ceep/biblioteca', $file_name);
            //dd(Storage::url($path));
            $url = Storage::url($path);
            $dados['arquivo'] = $url;
        }

        if( !$documento->update($dados) ){
            return back();
        }
        return redirect('/biblioteca/1');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biblioteca  $biblioteca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documento = Biblioteca::find($id);

        if(!$documento){
            return back()->withErrors('Planejamento não encontrado!');
        }

        $s3 = \Storage::disk('s3');
        $existingImagePath = $documento->arquivo; // this returns the path of the file stored in the db
        //dd($existingImagePath);
        $s3->delete($existingImagePath);

        if( !$documento->delete() ){
            return back();
        }

        return redirect('/biblioteca/1');
    }
}
