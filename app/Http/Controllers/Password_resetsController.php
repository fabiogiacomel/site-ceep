<?php
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    
    use App\Models\Password_resets;
    use App\Http\Requests;
    use App\Http\Requests\Password_resetsRequest;


    class Password_resetsController extends Controller
    {
        public function index(){
            $password_resets = Password_resets::all();
            //return response()->json(['status' => 'success','message' => $password_resets], 200);
            return view('password_resets.home', compact('password_resets'));
        }

        public function show($id){
            $password_resets = Password_resets::find($id);
            if (!$password_resets = Password_resets::find($id)){
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Informação não encontrada',
                    ],
                404
                );
            }
            
            //return response()->json(['status' => 'success','message' => $password_resets], 200);
            return view('password_resets.show', compact('password_resets'));
        }

        public function update(Password_resetsRequest $request, $id){
            $password_resets = Password_resets::find($id);
            $password_resets ->update($request->all());
            // return response()->json($password_resets);
            return redirect()->action('Password_resetsController@index')->withInput($request->only('nome'));
        }


        public function store(Password_resetsRequest $request){
            $password_resets = Password_resets::create($request->all());
            //return response()->json($password_resets);
            return redirect()->action('Password_resetsController@index')->withInput($request->only('nome'));
        }

        public function destroy($id){
            $password_resets = Password_resets::find($id);
            $password_resets ->delete();
            //return response()->json($password_resets);
            return redirect()->action('Password_resetsController@index');
        }

        public function create(){$password_resets = null;
            return view('password_resets.create-edit', compact('password_resets'));
        }

        public function edit($id){
            $password_resets = Password_resets::find($id);
            if(empty($password_resets)) {
                return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
            }
            //return response()->json($password_resets);
            return view('password_resets.create-edit', compact('password_resets'));
        }
    }
?>