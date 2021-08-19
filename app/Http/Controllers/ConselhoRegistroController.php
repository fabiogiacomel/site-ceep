<?php

namespace App\Http\Controllers;

use App\ConselhoRegistro;
use App\ConselhoInformacao;
use App\ConselhoCategoria;
use App\ConselhoDisciplina;
use App\DisciplinaCurso;
use Illuminate\Http\Request;
use Khill\Lavacharts\Lavacharts;
use Charts;
use App\Models\Curso;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Log;
use Illuminate\Support\Facades\DB;

class ConselhoRegistroController extends Controller
{
    public function index(Request $request)
    {
        $disc = ConselhoDisciplina::where('user_id', Auth::id())->get();

        $disciplinas = array();
        foreach ($disc as $d){
            $disciplinas[] = $d->id;
        }

        $registros = ConselhoRegistro::with('disciplina','disciplina.curso2','informacao')
                        ->whereIn('conselho_disciplina_id', $disciplinas)
                        ->orderBy('conselho_disciplina_id')
                        ->orderBy('aluno')->get();

        if (isApi()) {
            return retorno($registros, 200);
        }

        //dd($registros);
        return view('conselho.registro.index', compact('registros'));
    }


    public function create()
    {
        $cursos = Curso::where('celem', 0)->where('situacao', 1)->orderBy('nome')->get();

        return view('conselho.disciplina.create-edit', compact('cursos'));
    }



    public function showReport()
    {
        $cursos = Curso::get();

        return view('conselho.registro.report', compact('cursos'));
    }

    public function showGraphReport()
    {
        $cursos = Curso::get();

        return view('conselho.registro.graphreport', compact('cursos'));
    }

    
    public function reportTrimestral(Request $request)
    {
        $dados = $request->all();


        if(!isset($dados['data_ini']) || !isset($dados['data_fim'])){
            return retorno('Erro! Informe a data inicial e a data final', 404);
        }

        $cursos = array();
        if ($dados['curso'] == '0'){
            $cursos = Curso::get();
        }else{
            $cursos[] = Curso::find($dados['curso']);
        }

        $disciplinasCurso = DisciplinaCurso::where('id', '>', 0);
        if(isset($dados['curso']) && $dados['curso']  > 0){
            $disciplinasCurso = $disciplinasCurso->where('curso', $dados['curso']);
        }
        
        if(isset($dados['serie']) && $dados['serie']  > 0){
            $disciplinasCurso = $disciplinasCurso->where('serie', $dados['serie']);
        }
        $disciplinasCurso = $disciplinasCurso->get();

        //Até aqui tudo ok retornou todas as disciplinas cadastradas no banco

        //dd($disciplinasCurso);

        //$disciplinasCurso contém o nome de todas as disciplinas da serie para o curso
        //agora para cada disciplina ira buscar os registro em order do aluno e da informação 
        $registros = array();
        foreach ($disciplinasCurso as $d) {

            $disciplinas = ConselhoDisciplina::with('curso2', 'registros','registros.informacao', 'registros.disciplina', 'disciplina_curso')->whereHas('registros', function (Builder $query) use ($dados) {
                $query->whereBetween('created_at', [$dados['data_ini'], $dados['data_fim']]);
            })->where('disciplina', $d->id);

            if(isset($dados['curso']) && $dados['curso']  > 0){
                $disciplinas = $disciplinas->where('curso', $dados['curso']);
            }
            
            if(isset($dados['serie']) && $dados['serie']  > 0){
                $disciplinas = $disciplinas->where('serie', $dados['serie']);
            }

            if(isset($dados['turma']) && $dados['turma']  > 0){
                $disciplinas = $disciplinas->where('turma', $dados['turma']);
            }
            
            $disciplinas = $disciplinas->orderBy('conselho_disciplinas.curso')
            ->orderBy('conselho_disciplinas.serie')
            ->orderBy('conselho_disciplinas.turma')
            //->orderBy('conselho_registros.aluno')
            ->get();
            
            if(!$disciplinas || count($disciplinas) == 0){
                continue;
            }
            //dd($disciplinas);
            $registros[] = $disciplinas;
            //$relatorio['disciplina'] = 
        }

        $categorias = ConselhoCategoria::with('informacoesTodas')->whereIn('situacao', [1,2])->get();
        return view('conselho.report.trimestral', compact('registros', 'disciplinasCurso', 'categorias'));
    }


    public function report(Request $request)
    {
        $dados = $request->all();

        if(isset($dados['tipo'])){
            $tipo = $dados['tipo'];
        }else{
            $tipo = 0;
        }

        if(isset($dados['modelo'])){
            $modelo = $dados['modelo'];
            return $this->reportTrimestral($request);
        }else{
            $modelo = 0;
        }


        if(isset($dados['data_ini']) && isset($dados['data_fim'])){
            //$registros = ConselhoRegistro::with('disciplina','disciplina.curso2','informacao')
            
            
            $registros = ConselhoRegistro::with('disciplina2','disciplina.curso2','informacao')
            ->join('conselho_disciplinas', 'conselho_disciplinas.id','=', 'conselho_registros.conselho_disciplina_id')
            ->whereBetween('conselho_registros.created_at', [$dados['data_ini'], $dados['data_fim']]);
            
            if(isset($dados['curso']) && $dados['curso']  > 0){
                $registros->where('curso', $dados['curso']);
            }
            
            if(isset($dados['serie']) && $dados['serie']  > 0){
                $registros->where('serie', $dados['serie']);
            }

            if(isset($dados['turma']) && $dados['turma']  > 0){
                $registros->where('turma', $dados['turma']);
            }
            
            $registros = $registros->orderBy('conselho_disciplinas.curso')
            ->orderBy('conselho_disciplinas.serie')
            ->orderBy('conselho_disciplinas.turma')
            ->orderBy('conselho_registros.aluno')
            ->get();

            if(!$registros){
                return retorno('Nenhum dado encontrado', 404);
            }

            //dd($registros[0]);
            if($modelo == 0){
                return view('conselho.report.index', compact('registros','tipo'));
            }
            if($modelo == 1){
                return view('conselho.report.trimestral', compact('registros'));
            }
        }else{
            return retorno('Erro! Informe a data inicial e a data final', 404);
        }
    }

    public function graphReport(Request $request)
    {
        $dados = $request->all();
        if(isset($dados['tipo'])){
            $tipo = $dados['tipo'];
        }else{
            $tipo = 0;
        }
        if(isset($dados['data_ini']) && isset($dados['data_fim'])){
            //$registros = ConselhoRegistro::with('disciplina','disciplina.curso2','informacao')
            
            $registros = ConselhoRegistro::with('disciplina2','disciplina.curso2','informacao','informacao.categoria')
            ->join('conselho_disciplinas', 'conselho_disciplinas.id','=', 'conselho_registros.conselho_disciplina_id')
            ->whereBetween('conselho_registros.created_at', [$dados['data_ini'], $dados['data_fim']]);
            
            if(isset($dados['curso']) && $dados['curso']  > 0){
                $registros->where('curso', $dados['curso']);
            }
            
            if(isset($dados['serie']) && $dados['serie']  > 0){
                $registros->where('serie', $dados['serie']);
            }

            if(isset($dados['turma']) && $dados['turma']  > 0){
                $registros->where('turma', $dados['turma']);
            }
            
            $registros = $registros->select('conselho_informacaos.*','conselho_disciplina_id', 'conselho_informacao_id', DB::raw('count(aluno) as total'))
            ->join('conselho_informacaos', 'conselho_informacaos.id','=', 'conselho_registros.conselho_informacao_id')
            
            ->groupBy('conselho_disciplinas.curso')
            ->groupBy('conselho_disciplinas.serie')
            ->groupBy('conselho_disciplinas.turma')
            ->groupBy('conselho_informacao_id')
            ->orderBy('conselho_disciplinas.curso')
            ->orderBy('conselho_disciplinas.serie')
            ->orderBy('conselho_disciplinas.turma')
            ->orderBy('conselho_informacaos.conselho_categoria_id')

            /*->orderBy('informacao.categoria')*/
            ->orderBy('conselho_informacao_id')
            ->orderBy('conselho_disciplina_id')
            ->get();

            

           // dd($registros[0]);

            $curso = 0;
            $serie =0;
            $turma =0;
            $informacao =0;



            if(!$registros){
                return retorno('Nenhum dado encontrado', 404);
            }
        }else{
            return retorno('Selecione as datas', 500);
        }
        //dd($registros[0]->disciplina);
        return view('conselho.registro.graph', ['registros' => $registros]);

    }

    public function store(Request $request)
    {
        $dados = $request->all();

        //dd($dados);
        $validate = validator($dados, ConselhoDisciplina::rules());
        if ($validate->fails()) {
            $messages = $validate->messages();
            return retorno($messages, 500);
        }

        $disciplina = ConselhoDisciplina::create($dados);
        if (!$disciplina) {
            return retorno('Disciplina não encontrada', 404);
        }

        if(!isset($dados['info'])){
            return retorno('Nenhuma informação enviada!', 404, 'conselho-registro/create');
        }
        //dd($dados['info']);
        foreach ($dados['info'] as $key => $value) {
            foreach($value as $aluno){
                $info = ConselhoInformacao::find($key);
                if (!$info) {
                    return retorno('Informação não encontrada', 404);
                }

                $registro = array(
                    "aluno" => $aluno,
                    "conselho_informacao_id" => $key,
                    "conselho_disciplina_id" => $disciplina->id
                );
                $registro = ConselhoRegistro::create($registro);    
            }
        }

        //Carrega os dados para o relatório
        //$registros = ConselhoRegistro::with('disciplina','disciplina.curso2','informacao')->where('conselho_disciplina_id', $disciplina->id)->orderBy('aluno')->get();

        //if (isApi()) {
            //return retorno($registros, 200);
        //}

        //dd($registros);
        //return view('conselho.registro.index', compact('registros'));
        return $this->index($request);
    }

    public function show(Request $request, $id)
    {
        $ConselhoRegistro = ConselhoRegistro::find($id);
        if (!$ConselhoRegistro) {
            return retorno('ConselhoRegistro não encontrado', 404);
        }

        if (isApi()) {
            return retorno($ConselhoRegistro, 200);
        }

        return view('ConselhoRegistro.show', compact('ConselhoRegistro'));
    }


    public function edit(Request $request, $id)
    {
        $ConselhoRegistro = ConselhoRegistro::find($id);

        return view('ConselhoRegistro.create-edit', compact('ConselhoRegistro'));
    }

    public function update(Request $request, $id)
    {
        $ConselhoRegistro = ConselhoRegistro::find($id);

        if (!$ConselhoRegistro) {
            return retorno('ConselhoRegistro não encontrado', 404);
        }
        $dados = $request->all();
        $validate = validator($dados, ConselhoRegistro::rulesUpdate());
        if ($validate->fails()) {
            $messages = $validate->messages();
            return retorno($messages, 500);
        }
        if (!$ConselhoRegistro->update($request->all())) {
            return retorno('Não foi possivel alterar a ConselhoRegistro', 500);
        }
        Log::info("ConselhoRegistro código: [$id] alterado por " .  user_name());

        return retorno($ConselhoRegistro, 200);
    }

    public function destroy(Request $request, $id)
    {
        $ConselhoRegistro = ConselhoRegistro::find($id);
        if (!$ConselhoRegistro) {
            return retorno('Registro não encontrado', 404);
        }
        if (!$ConselhoRegistro->delete()) {
            return retorno('Não foi possivel excluir o registro', 500);
        }
        Log::info("Registro código: [$id] exclída por " .  user_name());

        return retorno('Registro excluído com sucesso', 200, '/conselho-registro');
    }
}
