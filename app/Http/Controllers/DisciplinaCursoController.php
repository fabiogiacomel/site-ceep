<?php

namespace App\Http\Controllers;

use App\DisciplinaCurso;
use App\ConselhoCategoria;
use App\Models\Curso;
use Illuminate\Http\Request;

class DisciplinaCursoController extends Controller
{
    public function index(Request $request)
    {
            $dados = $request->all();

            $disciplinas = DisciplinaCurso::with('curso');
            if(isset($dados['curso'])){
                $disciplinas = $disciplinas->where('curso', $dados['curso']);
            }
            if(isset($dados['serie'])){
                $disciplinas = $disciplinas->where('serie', $dados['serie']);
            }
            $disciplinas = $disciplinas->get();

            if(isApi()){
                return retorno($disciplinas, 200);
            }

            return view('conselho.disciplina-curso.index', compact('disciplinas'));
        }

        public function create()
        {
            $cursos = Curso::where('celem', 0)->where('situacao', 1)->orderBy('nome')->get();

            return view('conselho.disciplina-curso.create-edit', compact('cursos'));
        }

        public function store(Request $request)
        {
            $disciplina = $request->all();
            $validate = validator($disciplina, DisciplinaCurso::rules());
            if ($validate->fails()) {
                $messages = $validate->messages();
                return retorno($messages, 500);
            }

            $disciplina = DisciplinaCurso::create($disciplina);

            return $this->index();
        }

        public function show(Request $request, $id)
        {
            $disciplina = DisciplinaCurso::find($id);
            if (!$disciplina ) {
                return retorno('disciplina não encontrado', 404);
            }

            if(isApi()){
                return retorno($disciplina, 200);
            }

            return view('conselho.disciplina-curso.show', compact('disciplina'));
        }


        public function edit(Request $request, $id)
        {
            $cursos = Curso::get();
            $disciplina = DisciplinaCurso::find($id);

            return view('conselho.disciplina-curso.create-edit', compact('disciplina', 'cursos'));
        }

        public function update(Request $request, $id)
        {
            $disciplina = DisciplinaCurso::find($id);

            if (!$disciplina ) {
                return retorno('DisciplinaCurso não encontrado', 404);
            }
            $dados = $request->all();
            $validate = validator($dados, DisciplinaCurso::rulesUpdate());
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
            $disciplina = DisciplinaCurso::find($id);
            if (!$disciplina) {
                return retorno('disciplina não encontrado', 404);
            }
            if( !$disciplina->delete() ){
                return retorno('Não foi possivel excluir o disciplina', 500);
            }
            Log::info("disciplina código: [$id] exclída por ".  user_name());

            return retorno('Disciplina excluída', 200, '/conselho-disciplina-curso');
        }
    }