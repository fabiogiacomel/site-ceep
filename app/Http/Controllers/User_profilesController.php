<?php
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    
    use App\Models\User_profiles;
    use App\Http\Requests;
    use App\Http\Requests\User_profilesRequest;


    class User_profilesController extends Controller
    {
        public function index(){
            $user_profiles = User_profiles::all();
            //return response()->json(['status' => 'success','message' => $user_profiles], 200);
            return view('user_profiles.home', compact('user_profiles'));
        }

        public function show($id){
            $user_profiles = User_profiles::find($id);
            if (!$user_profiles = User_profiles::find($id)){
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Informação não encontrada',
                    ],
                404
                );
            }
            
            //return response()->json(['status' => 'success','message' => $user_profiles], 200);
            return view('user_profiles.show', compact('user_profiles'));
        }

        public function update(User_profilesRequest $request, $id){
            $user_profiles = User_profiles::find($id);
            $user_profiles ->update($request->all());
            // return response()->json($user_profiles);
            return redirect()->action('User_profilesController@index')->withInput($request->only('nome'));
        }


        public function store(User_profilesRequest $request){
            $user_profiles = User_profiles::create($request->all());
            //return response()->json($user_profiles);
            return redirect()->action('User_profilesController@index')->withInput($request->only('nome'));
        }

        public function destroy($id){
            $user_profiles = User_profiles::find($id);
            $user_profiles ->delete();
            //return response()->json($user_profiles);
            return redirect()->action('User_profilesController@index');
        }

        public function create(){$user_profiles = null;
            return view('user_profiles.create-edit', compact('user_profiles'));
        }

        public function edit($id){
            $user_profiles = User_profiles::find($id);
            if(empty($user_profiles)) {
                return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
            }
            //return response()->json($user_profiles);
            return view('user_profiles.create-edit', compact('user_profiles'));
        }
    }
?>