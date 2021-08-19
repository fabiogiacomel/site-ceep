<?php

namespace App\Http\Controllers;

use App\ConselhoDisciplina;
use App\ConselhoCategoria;
use App\DisciplinaCurso;
use App\Models\Curso;
use Illuminate\Http\Request;
use Log;
use Auth;


class ConselhoDisciplinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $disciplinas = ConselhoDisciplina::get();

            if(isApi()){
                return retorno($disciplinas, 200);
            }

            return view('conselho.disciplina.index', compact('disciplinas'));
        }

        public function createSimplificado()
        {
            $cursos = Curso::where('celem', 0)->where('situacao', 1)->orderBy('nome')->get();

            return view('conselho.disciplina.create-edit-simplificado', compact('cursos'));
        }

        public function createCompleto()
        {
            $cursos = Curso::where('celem', 0)->where('situacao', 1)->orderBy('nome')->get();

            return view('conselho.disciplina.create-edit-completo', compact('cursos'));
        }

        public function store(Request $request)
        {
            $disciplina = $request->all();
            $validate = validator($disciplina, ConselhoDisciplina::rules());
            if ($validate->fails()) {
                $messages = $validate->messages();
                return retorno($messages, 500);
            }

            //1 - A (Manhã), 2 - B (Manhã), 4 - B (Tarde), 3 - C (Tarde), 5 (B e C Noite)
            /*if($disciplina['periodo']=="M"){
                if($disciplina['turma'] > 2){
                    return retorno('Nas turmas da manhã só temos turmas A e B', 500);
                }
            }
            /*if($disciplina['periodo']=="T"){
                if($disciplina['turma'] < 3 || $disciplina['turma'] > 4){
                    return retorno('Nas turmas da tarde só temos turmas B (Tarde) e C', 500);
                }
            }

            if($disciplina['periodo']=="N"){
                if($disciplina['turma'] != 5){
                    return retorno('Nas turmas da noite escolha a turma B ou C', 500);
                }
            }*/

            $disciplina['user_id'] = Auth::id();
            
            //Vou criar tudo no registro
            //$disciplina = ConselhoDisciplina::create($disciplina);


            if(is_numeric($disciplina['disciplina'])){
                $disciplinaCurso = DisciplinaCurso::find($disciplina['disciplina']);
                $disciplina['disciplina_nome'] = $disciplinaCurso->nome;
            }else{
                $disciplina['disciplina_nome'] = $disciplina['disciplina'];
            }

            $curso = Curso::find($disciplina['curso']);

            if(isset($disciplina['completo'])){
                $categorias = ConselhoCategoria::with('informacoesTodas')->whereIn('situacao', [1,2])->get();
                $tipo = 'completo';

               // return view('conselho.registro.create-edit-completo', compact('curso', 'categorias', 'disciplina'));
            }else{
                $categorias = ConselhoCategoria::with('informacoes')->where('situacao', 1)->get();
                $tipo = 'simplificado';

            }
            //dd($categorias->informacoesTodas);

            return view('conselho.registro.create-edit', compact('curso', 'categorias', 'disciplina', 'tipo'));
        }

        public function show(Request $request, $id)
        {
            $disciplina = ConselhoDisciplina::find($id);
            if (!$disciplina ) {
                return retorno('disciplina não encontrado', 404);
            }

            if(isApi()){
                return retorno($disciplina, 200);
            }

            return view('conselho.disciplina.show', compact('disciplina'));
        }


        public function edit(Request $request, $id)
        {
            $cursos = Curso::get();
            $disciplina = ConselhoDisciplina::find($id);

            return view('conselho.disciplina.create-edit', compact('disciplina', 'cursos'));
        }

        public function update(Request $request, $id)
        {
            $disciplina = ConselhoDisciplina::find($id);

            if (!$disciplina ) {
                return retorno('ConselhoDisciplina não encontrado', 404);
            }
            $dados = $request->all();
            $validate = validator($dados, ConselhoDisciplina::rulesUpdate());
            if ($validate->fails()) {
                $messages = $validate->messages();
                return retorno($messages, 500);
            }
            if( !$disciplina->update($request->all()) ){
                return retorno('Não foi possivel alterar a disciplina', 500);
            }
            Log::info("disciplina código: [$id] alterado por ".  user_name());

            return retorno('Disciplina atualizada', 200);
        }

        public function destroy(Request $request, $id)
        {
            $disciplina = ConselhoDisciplina::find($id);
            if (!$disciplina) {
                return retorno('disciplina não encontrado', 404);
            }
            if( !$disciplina->delete() ){
                return retorno('Não foi possivel excluir o disciplina', 500);
            }
            Log::info("disciplina código: [$id] exclída por ".  user_name());

            return retorno('Disciplina excluída', 200, '/conselho-disciplina');
        }
    }
