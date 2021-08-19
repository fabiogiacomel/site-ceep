<?php
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    
    use App\Models\Permissions;
    use App\Http\Requests;
    use App\Http\Requests\PermissionsRequest;


    class PermissionsController extends Controller
    {
        public function index(){
            $permissions = Permissions::all();
            //return response()->json(['status' => 'success','message' => $permissions], 200);
            return view('permissions.home', compact('permissions'));
        }

        public function show($id){
            $permissions = Permissions::find($id);
            if (!$permissions = Permissions::find($id)){
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Informação não encontrada',
                    ],
                404
                );
            }
            
            //return response()->json(['status' => 'success','message' => $permissions], 200);
            return view('permissions.show', compact('permissions'));
        }

        public function update(PermissionsRequest $request, $id){
            $permissions = Permissions::find($id);
            $permissions ->update($request->all());
            // return response()->json($permissions);
            return redirect()->action('PermissionsController@index')->withInput($request->only('nome'));
        }


        public function store(PermissionsRequest $request){
            $permissions = Permissions::create($request->all());
            //return response()->json($permissions);
            return redirect()->action('PermissionsController@index')->withInput($request->only('nome'));
        }

        public function destroy($id){
            $permissions = Permissions::find($id);
            $permissions ->delete();
            //return response()->json($permissions);
            return redirect()->action('PermissionsController@index');
        }

        public function create(){$permissions = null;
            return view('permissions.create-edit', compact('permissions'));
        }

        public function edit($id){
            $permissions = Permissions::find($id);
            if(empty($permissions)) {
                return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
            }
            //return response()->json($permissions);
            return view('permissions.create-edit', compact('permissions'));
        }
    }
?>