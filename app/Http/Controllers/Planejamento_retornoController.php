<?php

    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use App\Models\Planejamento_retorno;
    
    class Planejamento_retornoController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $planejamento_retorno = Planejamento_retorno::get();
            return view('planejamento_retorno.index', compact('$planejamento_retorno'));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('planejamento_retorno.create-edit');
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
            
            $planejamento_retorno = Planejamento_retorno::create($dados);  
    
            //toastr()->success('Planejamento_retorno criada com sucesso!');
    
            return redirect('/planejamento_retorno');
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $planejamento_retorno = Planejamento_retorno::find($id);
    
            return view('planejamento_retorno.show', compact('$planejamento_retorno'));
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $planejamento_retorno = Planejamento_retorno::find($id);
    
            return view('planejamento_retorno.create-edit', compact('$planejamento_retorno'));
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            $planejamento_retorno = Planejamento_retorno::find($id);
    
            if( !$planejamento_retorno->update($request->all()) ){
                return back();
            }
    
            //toastr()->success('Planejamento_retorno atualizada com sucesso!');
    
            return back();
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $planejamento_retorno = Planejamento_retorno::find($id);
    
            if( !$planejamento_retorno->delete() ){
                return back();
            }
    
            //toastr()->success('Planejamento_retorno deletada com sucesso!');
    
            return redirect('/planejamento_retorno');
        }
    }