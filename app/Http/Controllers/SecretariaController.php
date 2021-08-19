<?php
namespace App\Http\Controllers;

use App\Http\Requests\SecretariaRequest;
use App\Models\Secretaria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SecretariaController extends Controller
{
    public function index()
    {
        $noticia = Secretaria::where('tipo', '=', 2)->orderBy('created_at', 'DESC')->get();
        //return response()->json(['status' => 'success','message' => $secretaria], 200);
        return view('secretaria.home', compact('noticia'));
    }

    public function show($id)
    {
        if (!$noticia = Secretaria::find($id)) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Informação não encontrada',
                ],
                404
            );
        }
        dd($noticia);

        //return response()->json(['status' => 'success','message' => $secretaria], 200);
        return view('secretaria.show', compact('noticia'));
    }

    public function update(SecretariaRequest $request, $id)
    {
        $noticia = Secretaria::find($id);
        $data = $request->all();

        //Apaga imagem do s3
        if($request->has('imagem')){

            $image_s3 = basename($noticia->imagem);
            $url = 'ceep/noticia/' . $image_s3;

            if (Storage::disk('s3')->exists($url)) {
                Storage::disk('s3')->delete($url);
            }
            $path = $request->file('imagem')->store('ceep/noticia');
            $url = Storage::url($path);
            $data['imagem'] = $url;
        }
        $data['tipo'] = 2;
        $data['situacao'] = 'ativo';
        $data['user_id'] = Auth::id();
        $data['situacao'] = 'ativo';

        $noticia->update($data);

        return redirect()->action('SecretariaController@index')->withInput($request->only('nome'));
    }

    public function store(SecretariaRequest $request)
    {
        $data = $request->all();

        if ($request->hasfile('imagem')) {
            $path = $request->file('imagem')->store('ceep/secretaria');

            $url = Storage::url($path);

            $data['imagem'] = $url;
        }
        $data['tipo'] = 2;
        $data['user_id'] = Auth::id();
        $data['situacao'] = 'ativo';

        $noticia = Secretaria::create($data);

        return redirect()->action('SecretariaController@index')->withInput($request->only('nome'));
    }

    public function destroy($id)
    {
        $noticia = Secretaria::find($id);
        $noticia->delete();
        //return response()->json($secretaria);
        return redirect()->action('SecretariaController@index');
    }

    public function create()
    {$noticia = null;
        return view('secretaria.create-edit', compact('noticia'));
    }

    public function edit($id)
    {
        $noticia = Secretaria::find($id);
        if (empty($noticia)) {
            return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
        }
        //return response()->json($secretaria);
        return view('secretaria.create-edit', compact('noticia'));
    }
}
