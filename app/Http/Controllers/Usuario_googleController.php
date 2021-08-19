<?php
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    
    use App\Models\Usuario_google;
    use App\Http\Requests;
    use App\Http\Requests\Usuario_googleRequest;


    class Usuario_googleController extends Controller
    {
        public function index(){
            $usuario_google = Usuario_google::all();
            //return response()->json(['status' => 'success','message' => $usuario_google], 200);
            return view('usuario_google.home', compact('usuario_google'));
        }

        public function show($id){
            $usuario_google = Usuario_google::find($id);
            if (!$usuario_google = Usuario_google::find($id)){
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Informação não encontrada',
                    ],
                404
                );
            }
            
            //return response()->json(['status' => 'success','message' => $usuario_google], 200);
            return view('usuario_google.show', compact('usuario_google'));
        }

        public function update(Usuario_googleRequest $request, $id){
            $usuario_google = Usuario_google::find($id);
            $usuario_google ->update($request->all());
            // return response()->json($usuario_google);
            return redirect()->action('Usuario_googleController@index')->withInput($request->only('nome'));
        }


        public function store(Usuario_googleRequest $request){
            $usuario_google = Usuario_google::create($request->all());
            //return response()->json($usuario_google);
            return redirect()->action('Usuario_googleController@index')->withInput($request->only('nome'));
        }

        public function destroy($id){
            $usuario_google = Usuario_google::find($id);
            $usuario_google ->delete();
            //return response()->json($usuario_google);
            return redirect()->action('Usuario_googleController@index');
        }

        public function create(){$usuario_google = null;
            return view('usuario_google.create-edit', compact('usuario_google'));
        }

        public function edit($id){
            $usuario_google = Usuario_google::find($id);
            if(empty($usuario_google)) {
                return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
            }
            //return response()->json($usuario_google);
            return view('usuario_google.create-edit', compact('usuario_google'));
        }
    }
?>