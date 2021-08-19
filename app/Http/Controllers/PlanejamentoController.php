<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Planejamento;
    use App\Models\Planejamento_old;
    use App\Models\Curso;
    use App\Models\Usuario;
    use Auth;
    use Storage;

    class PlanejamentoController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {

            //Pega o id do usuario no banco de dados antigo
            $id_usuario = Usuario::where('usuario', Auth::user()->email)->first();

            //Pega os planejamentos do banco de dado novo
            $planejamentos = Planejamento::with('curso2')->where('situacao', '1')->where('idusuario', Auth::id())->where('DATA', '>', '2021-01-01')->get();
            
            $planejamentos_old = Planejamento_old::with('curso2')->where('situacao', '1')->where('idusuario', Auth::id())->where('DATA', '>', '2021-01-01')->get();
            return view('planejamento.show', compact('planejamentos', 'planejamentos_old'));
        }

        public function all()
        {
            $planejamentos = Planejamento::with('curso2', 'usuario')->where('DATA', '>', '2021-01-01')->get();
            $planejamentos2 = Planejamento_old::with('curso2', 'usuario')->where('DATA', '>', '2021-01-01')->get();
            //dd($planejamentos2[0]);
            return view('planejamento.index', compact('planejamentos','planejamentos2'));
        }
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $curso = Curso::orderBy('nome')->get();
            return view('planejamento.create-edit', compact('curso'));
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

            $curso = Curso::where('idcurso', $dados['curso'])->first();

            $dados['idusuario'] = Auth::id();

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

            if(!isset($dados['turma'])){
                $dados['turma'] = 'ABC';
            }
            if ($request->hasFile('arquivo')) {
                $ext = $request->file('arquivo')->getClientOriginalExtension();
                $file_name  = $curso->nome . '_' . $series[$dados['serie']] . '_' . $dados['turma'] . '_' . $dados['disciplina'] . '_' . substr(md5(date("dmYHis")), 0, 5) .'.'. $ext;
                //dd($file_name);
                $path = $request->file('arquivo')->storeAs('ceep/ptd', $file_name);
                //dd(Storage::url($path));
                $url = Storage::url($path);
                $dados['arquivo'] = $url;
            }

            //dd($dados);
            $planejamento = Planejamento::create($dados);

            //toastr()->success('Planejamento criada com sucesso!');
            //dd($planejamento);
            return redirect('/planejamento');
        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $id_usuario = Usuario::where('usuario', Auth::user()->email)->first();
            $planejamentos = Planejamento::with('curso2')->where('situacao', '1')->where('idusuario', $id_usuario)->get();

            //dd($planejamentos);
            return view('planejamento.show', compact('planejamentos'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $planejamento = Planejamento::find($id);

            return view('planejamento.create-edit', compact('planejamento'));
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
            $planejamento = Planejamento::find($id);

            if( !$planejamento->update($request->all()) ){
                return back();
            }

            //toastr()->success('Planejamento atualizada com sucesso!');

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
            $planejamento = Planejamento::where('idplanejamento', $id)->first();

            //dd($id);
            if(!$planejamento){
                return back()->withErrors('Planejamento não encontrado!');
            }
            if( !$planejamento->delete() ){
                return back();
            }

            //toastr()->success('Planejamento deletada com sucesso!');

            return redirect('/planejamento');
        }
    }
