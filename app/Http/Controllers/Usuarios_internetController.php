<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    use App\Models\Usuarios_internet;
    use App\Http\Requests;
    use App\Http\Requests\Usuarios_internetRequest;


    class Usuarios_internetController extends Controller
    {
        public function index(){
            $usuarios_internet = Usuarios_internet::all();
            //return response()->json(['status' => 'success','message' => $usuarios_internet], 200);
            return view('usuarios_internet.home', compact('usuarios_internet'));
        }

        public function show($id){
            $usuarios_internet = Usuarios_internet::find($id);
            if (!$usuarios_internet = Usuarios_internet::find($id)){
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Informação não encontrada',
                    ],
                404
                );
            }

            //return response()->json(['status' => 'success','message' => $usuarios_internet], 200);
            return view('usuarios_internet.show', compact('usuarios_internet'));
        }

        public function update(Usuarios_internetRequest $request, $id){
            $usuarios_internet = Usuarios_internet::find($id);
            $usuarios_internet ->update($request->all());
            // return response()->json($usuarios_internet);
            return redirect()->action('Usuarios_internetController@index')->withInput($request->only('nome'));
        }

        public function cadastro(Request $request){
            try{
                $dados = $request->all();
                $usuario = Usuarios_internet::where('cgm', $dados['username'])->first();

                if(!isset($dados['name'])||!isset($dados['email'])||!isset($dados['username'])||!isset($dados['password'])){
                    return "<div class='alert alert-danger'>Todos os dados devem ser preenchidos!</div>";
                }
                if(!$usuario){
                    $dados2['nome'] = $dados['name'];
                    $dados2['email'] = $dados['email'];
                    $dados2['cgm'] = $dados['username'];
                    $dados2['senha'] = $dados['password'];
                    $dados2['cgm_md5'] = md5($dados['username']);
                    $dados2['situacao'] = 'validado';
                    //dd($dados2);

                    Usuarios_internet::create($dados2);

                    echo '<div class="alert alert-success"><strong>Parabéns!</strong> Cadastro realizado com sucesso. <br />Aguarde 5 minutos para que sua conta seja ativada</div>';
                    //return '<div class="alert alert-success"><strong>Parabéns!</strong> Cadastro realizado com sucesso. <br />
                }else{
                    return "<div class='alert alert-danger'>Este nome de usuário já está em uso!</div>";
                }
            }catch (PDOException $e){
                echo "<div class='alert alert-danger'>Erro ao gravar:".$e->getMessage()."</div>";
                //return "<div class='alert alert-danger'>Erro ao gravar:".$e->getMessage()."</div>";
                GeraLog::getInstance()->inserirLog("Erro ao gravar usuario: Código: " . $e->getCode() . " Mensagem: " . $e->getMessage());
            }
        }

        public function store(Usuarios_internetRequest $request){
            $usuarios_internet = Usuarios_internet::create($request->all());
            //return response()->json($usuarios_internet);
            return redirect()->action('Usuarios_internetController@index')->withInput($request->only('nome'));
        }

        public function destroy($id){
            $usuarios_internet = Usuarios_internet::find($id);
            $usuarios_internet ->delete();
            //return response()->json($usuarios_internet);
            return redirect()->action('Usuarios_internetController@index');
        }

        public function create(){$usuarios_internet = null;
            return view('usuarios_internet.create-edit', compact('usuarios_internet'));
        }

        public function edit($id){
            $usuarios_internet = Usuarios_internet::find($id);
            if(empty($usuarios_internet)) {
                return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
            }
            //return response()->json($usuarios_internet);
            return view('usuarios_internet.create-edit', compact('usuarios_internet'));
        }
    }
?>
