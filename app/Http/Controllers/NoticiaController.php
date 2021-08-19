<?php
namespace App\Http\Controllers;

use App\Http\Requests\NoticiaRequest;
use App\Models\Noticia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticia = Noticia::where('tipo', '=', 1)->get();
        //return response()->json(['status' => 'success','message' => $noticia], 200);
        /*$app_id = '371881580335162'; //ceep oficial - 1796820613750766
        $app_secret = '8aeb1b5cee627b0ccd3524af3bb9acc3'; //ceep oficial - 1f2004c453be3a6d413b8ec95f33e57b
        $access_token_url = "https://graph.facebook.com/oauth/access_token?client_id=$app_id&client_secret=$app_secret&grant_type=client_credentials";
        //dd($access_token_url );
        $access_token_data = file_get_contents($access_token_url);
        $access_token_arr = json_decode($access_token_data);
        $access_token = $access_token_arr->access_token;
        $access_token = "EAAFSOW1ZBkDoBAG7buZCJwdOmVYMt3HOyZBEdZBy65UFJdJM6neomkPiaYGtMRlQVawsXRS1LOuqQfOURlkIAs4QE4vMFYtScVAm0HlOZCb3O1KFnZAZBgqLpicZBQgwKopo0K25LoOqiJNIIjXrk5BswWR79TimXCEEBta7Bdzu0IDVHKy6pOhe";

        $fb = new \Facebook\Facebook([
        'app_id' => $app_id,
        'app_secret' => $app_secret,
        'default_graph_version' => 'v3.2',
        'default_access_token' => $access_token, // optional
        ]);
        try {
            // Get the \Facebook\GraphNodes\GraphUser object for the current user.
            // If you provided a 'default_access_token', the '{access-token}' is optional.
            $response = $fb->get('ceepcascavel/posts?fields=created_time,full_picture,icon,link,message,name,permalink_url,picture,parent_id,story,type&limit=3&locale=pt_BR', $access_token);
        } catch(\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        $posts = $response->getDecodedBody()['data'];*/
        $posts = array();

        return view('noticia.home', compact('posts','noticia'));
    }

    public function show($id)
    {
        $noticia = Noticia::find($id);
        if (!$noticia = Noticia::find($id)) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Informação não encontrada',
                ],
                404
            );
        }

        //return response()->json(['status' => 'success','message' => $noticia], 200);
        return view('noticia.show', compact('noticia'));
    }

    public function update(NoticiaRequest $request, $id)
    {
        $noticia = Noticia::find($id);
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
        $data['situacao'] = 'ativo';
        $data['user_id'] = Auth::id();

        $noticia->update($data);
        // return response()->json($noticia);
        return redirect()->action('NoticiaController@index')->withInput($request->only('nome'));
    }

    public function store(NoticiaRequest $request)
    {
        $data = $request->all();

        $path = $request->file('imagem')->store('ceep/noticia');

        $url = Storage::url($path);
       
        $data['imagem'] = $url;
        $data['situacao'] = 'ativo';
        $data['user_id'] = Auth::id();

        //dd($data);
        $noticia = Noticia::create($data);
        //return response()->json($noticia);
        return redirect()->action('NoticiaController@index')->withInput($request->only('nome'));
    }

    public function destroy($id)
    {
        $noticia = Noticia::find($id);
        $noticia->delete();
        //return response()->json($noticia);
        return redirect()->action('NoticiaController@index');
    }

    public function create()
    {$noticia = null;
        return view('noticia.create-edit', compact('noticia'));
    }

    public function edit($id)
    {
        $noticia = Noticia::find($id);
        if (empty($noticia)) {
            return '<div class="alert alert-danger">Erro: objeto não encontrado</div>';
        }
        //return response()->json($noticia);
        return view('noticia.create-edit', compact('noticia'));
    }
}
