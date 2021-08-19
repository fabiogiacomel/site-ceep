<?php
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    
    use App\Models\Migrations;
    use App\Http\Requests;
    use App\Http\Requests\MigrationsRequest;


    class MigrationsController extends Controller
    {
        public function index(){
            $migrations = Migrations::all();
            //return response()->json(['status' => 'success','message' => $migrations], 200);
            return view('migrations.home', compact('migrations'));
        }

        public function show($id){
            $migrations = Migrations::find($id);
            if (!$migrations = Migrations::find($id)){
                return response()->json(
                    [
                        'status' => 'error',
                        'message' => 'Informação não encontrada',
                    ],
                404
                );
            }
            
            //return response()->json(['status' => 'success','message' => $migrations], 200);
            return view('migrations.show', compact('migrations'));
        }

        public function update(MigrationsRequest $request, $id){
            $migrations = Migrations::find($id);
            $migrations ->update($request->all());
            // return response()->json($migrations);
            return redirect()->action('MigrationsController@index')->withInput($request->only('nome'));
        }


        public function store(MigrationsRequest $request){
            $migrations = Migrations::create($request->all());
            //return response()->json($migrations);
            return redirect()->action('MigrationsController@index')->withInput($request->only('nome'));
        }

        public function destroy($id){
            $migrations = Migrations::find($id);
            $migrations ->delete();
            //return response()->json($migrations);
            return redirect()->action('MigrationsController@index');
        }

        public function create(){$migrations = null;
            return view('migrations.create-edit', compact('migrations'));
        }

        public function edit($id){
            $migrations = Migrations::find($id);
            if(empty($migrations)) {
                return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
            }
            //return response()->json($migrations);
            return view('migrations.create-edit', compact('migrations'));
        }
    }
?>