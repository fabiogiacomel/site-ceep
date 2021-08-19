<?php
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    
    use App\Models\Profile_permissions;
    use App\Http\Requests;
    use App\Http\Requests\Profile_permissionsRequest;


    class Profile_permissionsController extends Controller
    {
        public function index(){
            $profile_permissions = Profile_permissions::all();
            //return response()->json(['status' => 'success','message' => $profile_permissions], 200);
            return view('profile_permissions.home', compact('profile_permissions'));
        }

        public function show($id){
            $profile_permissions = Profile_permissions::find($id);
            if (!$profile_permissions = Profile_permissions::find($id)){
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Informação não encontrada',
                    ],
                404
                );
            }
            
            //return response()->json(['status' => 'success','message' => $profile_permissions], 200);
            return view('profile_permissions.show', compact('profile_permissions'));
        }

        public function update(Profile_permissionsRequest $request, $id){
            $profile_permissions = Profile_permissions::find($id);
            $profile_permissions ->update($request->all());
            // return response()->json($profile_permissions);
            return redirect()->action('Profile_permissionsController@index')->withInput($request->only('nome'));
        }


        public function store(Profile_permissionsRequest $request){
            $profile_permissions = Profile_permissions::create($request->all());
            //return response()->json($profile_permissions);
            return redirect()->action('Profile_permissionsController@index')->withInput($request->only('nome'));
        }

        public function destroy($id){
            $profile_permissions = Profile_permissions::find($id);
            $profile_permissions ->delete();
            //return response()->json($profile_permissions);
            return redirect()->action('Profile_permissionsController@index');
        }

        public function create(){$profile_permissions = null;
            return view('profile_permissions.create-edit', compact('profile_permissions'));
        }

        public function edit($id){
            $profile_permissions = Profile_permissions::find($id);
            if(empty($profile_permissions)) {
                return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
            }
            //return response()->json($profile_permissions);
            return view('profile_permissions.create-edit', compact('profile_permissions'));
        }
    }
?>