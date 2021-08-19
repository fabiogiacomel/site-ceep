<?php
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    
    use App\Models\Users;
    use App\Http\Requests;
    use App\Http\Requests\UsersRequest;


    class UsersController extends Controller
    {
        public function index(){
            $users = Users::all();
            //return response()->json(['status' => 'success','message' => $users], 200);
            return view('users.home', compact('users'));
        }

        public function show($id){
            $users = Users::find($id);
            if (!$users = Users::find($id)){
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Informação não encontrada',
                    ],
                404
                );
            }
            
            //return response()->json(['status' => 'success','message' => $users], 200);
            return view('users.show', compact('users'));
        }

        public function update(UsersRequest $request, $id){
            $users = Users::find($id);
            $users ->update($request->all());
            // return response()->json($users);
            return redirect()->action('UsersController@index')->withInput($request->only('nome'));
        }


        public function store(UsersRequest $request){
            $users = Users::create($request->all());
            //return response()->json($users);
            return redirect()->action('UsersController@index')->withInput($request->only('nome'));
        }

        public function destroy($id){
            $users = Users::find($id);
            $users ->delete();
            //return response()->json($users);
            return redirect()->action('UsersController@index');
        }

        public function create(){$users = null;
            return view('users.create-edit', compact('users'));
        }

        public function edit($id){
            $users = Users::find($id);
            if(empty($users)) {
                return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
            }
            //return response()->json($users);
            return view('users.create-edit', compact('users'));
        }
    }
?>