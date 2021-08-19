<?php
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    
    use App\Models\Profiles;
    use App\Http\Requests;
    use App\Http\Requests\ProfilesRequest;


    class ProfilesController extends Controller
    {
        public function index(){
            $profiles = Profiles::all();
            //return response()->json(['status' => 'success','message' => $profiles], 200);
            return view('profiles.home', compact('profiles'));
        }

        public function show($id){
            $profiles = Profiles::find($id);
            if (!$profiles = Profiles::find($id)){
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Informação não encontrada',
                    ],
                404
                );
            }
            
            //return response()->json(['status' => 'success','message' => $profiles], 200);
            return view('profiles.show', compact('profiles'));
        }

        public function update(ProfilesRequest $request, $id){
            $profiles = Profiles::find($id);
            $profiles ->update($request->all());
            // return response()->json($profiles);
            return redirect()->action('ProfilesController@index')->withInput($request->only('nome'));
        }


        public function store(ProfilesRequest $request){
            $profiles = Profiles::create($request->all());
            //return response()->json($profiles);
            return redirect()->action('ProfilesController@index')->withInput($request->only('nome'));
        }

        public function destroy($id){
            $profiles = Profiles::find($id);
            $profiles ->delete();
            //return response()->json($profiles);
            return redirect()->action('ProfilesController@index');
        }

        public function create(){$profiles = null;
            return view('profiles.create-edit', compact('profiles'));
        }

        public function edit($id){
            $profiles = Profiles::find($id);
            if(empty($profiles)) {
                return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
            }
            //return response()->json($profiles);
            return view('profiles.create-edit', compact('profiles'));
        }
    }
?>