<?php

namespace App\Http\Controllers;

use App\Mail\SendMailContact;
use App\Models\Noticia;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::where('tipo', '=', 1)->where('situacao', '=', 'ativo')->orderBy('id', 'desc')->limit(6)->get();

        $app_id = '706242256457912'; //ceep oficial - 1796820613750766
        $app_secret = 'c7132457a2e9067b7a5ddddccfcfd264'; //ceep oficial - 1f2004c453be3a6d413b8ec95f33e57b
        //$access_token_url = "https://graph.facebook.com/oauth/access_token?client_id=$app_id&client_secret=$app_secret&grant_type=client_credentials";
        //dd($access_token_url );
        //$access_token_data = file_get_contents($access_token_url);
        //$access_token_arr = json_decode($access_token_data);
        //$access_token = $access_token_arr->access_token;
        $access_token = "EAAKCUtbSULgBAPIdjOXcIIJ4EZCacXeCeILOCp0jpQrRoe9HZC9FLT6UVN7pk4QCbPxCjPR2UFVYQzz8OCWZBsXRXu9Bw0ireERJY22rYQPlB9phVkZBdgbKCAMubFo69836ko6fCJFra6124TuOxP3526D1tEMGeyx66LgZBNy960pdqReRI";
        //dd($access_token);


        $fb = new \Facebook\Facebook([
        'app_id' => $app_id,
        'app_secret' => $app_secret,
        'default_graph_version' => 'v3.3',
        'default_access_token' => $access_token, // optional
        ]);

        // Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
        //   $helper = $fb->getRedirectLoginHelper();
        //   $helper = $fb->getJavaScriptHelper();
        //   $helper = $fb->getCanvasHelper();
        //   $helper = $fb->getPageTabHelper();
        //dd($helper);
        try {
        // Get the \Facebook\GraphNodes\GraphUser object for the current user.
        // If you provided a 'default_access_token', the '{access-token}' is optional.
        $response = $fb->get('ceepcascavel/posts?fields=created_time,full_picture,icon,message,permalink_url,picture,parent_id,story&limit=6&locale=pt_BR', $access_token);
        } catch(\Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        //echo 'Graph returned an error: ' . $e->getMessage();
       // exit;
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        //echo 'Facebook SDK returned an error: ' . $e->getMessage();
        //exit;
        }
        if(isset($response)&&isset($response->getDecodedBody()['data'])){
            $posts = $response->getDecodedBody()['data'];
        }else{
            $posts = array();
        }
        //dd($posts);

        $secretarias = Noticia::where('tipo', '=', 2)->limit(3)->orderBy('id', 'desc')->get();

        return view('index', compact('posts', 'noticias', 'secretarias'));
    }

    public function noticias()
    {
        $noticias = Noticia::where('tipo', '=', 1)->get();
        $app_id = '2059949174113388'; //ceep oficial - 1796820613750766
        $app_secret = 'eafca5a7d4d9c9cc538d56dd94d3c0cb'; //ceep oficial - 1f2004c453be3a6d413b8ec95f33e57b
        $access_token_url = "https://graph.facebook.com/oauth/access_token?client_id=$app_id&client_secret=$app_secret&grant_type=client_credentials";
        //dd($access_token_url );
        $access_token_data = file_get_contents($access_token_url);
        $access_token_arr = json_decode($access_token_data);
        $access_token = $access_token_arr->access_token;
        //dd($access_token);
        //$access_token = "EAAFSOW1ZBkDoBAG7buZCJwdOmVYMt3HOyZBEdZBy65UFJdJM6neomkPiaYGtMRlQVawsXRS1LOuqQfOURlkIAs4QE4vMFYtScVAm0HlOZCb3O1KFnZAZBgqLpicZBQgwKopo0K25LoOqiJNIIjXrk5BswWR79TimXCEEBta7Bdzu0IDVHKy6pOhe";

        $fb = new \Facebook\Facebook([
        'app_id' => $app_id,
        'app_secret' => $app_secret,
        'default_graph_version' => 'v3.2',
        'default_access_token' => $access_token, // optional
        ]);
        try {
            // Get the \Facebook\GraphNodes\GraphUser object for the current user.
            // If you provided a 'default_access_token', the '{access-token}' is optional.
            $response = $fb->get('ceepcascavel/posts?fields=created_time,full_picture,icon,link,message,name,permalink_url,picture,parent_id,story,type&limit=12&locale=pt_BR', $access_token);
        } catch(\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        $posts = $response->getDecodedBody()['data'];
        return view('noticia.all', compact('posts','noticias'));
    }

    public function secretarias()
    {
        $secretaria = Noticia::where('tipo', '=', 2)->orderBy('id', 'desc')->get();
        return view('secretaria.all', compact('secretaria'));
    }

    public function enviar_email()
    {
        //Get all the data and store it inside Store Variable
        $data = Input::all();

        //Validation rules
        $rules = array(
            'name' => 'required|min:5',
            'email' => 'required|email',
            'subject' => 'required|min:5',
            'message' => 'required|min:5',
        );

        //Validate data
        $validator = Validator::make($data, $rules);
        //dd($validator->errors());
        //If everything is correct than run passes.
        if ($validator->passes()) {
            //Mail::to('contato@ceepcascavel.com.br')->send(new SendMailContact($data));

            /*  Mail::send('emails.contato', $data, function ($message) use ($data) {
            $message->from($data['email'], $data['name']);
            // $message->from('contato@ceepcascavel.com.br', 'Contato site CEEP');
            $message->to('contato@ceepcascavel.com.br', 'Contato')->subject($data['sub ject'])->send(new SendMailContact($data));*/
            //});
            // Redirect to page
            $urlBack = redirect()->back()->getTargetUrl();
            return redirect($urlBack . '#contato2')->with('contact_message', 'Sua mensagem foi enviada com sucesso!');
            // return Redirect::route('index')->with('contact_message', 'Sua mensagem foi enviada com sucesso!');

            //return View::make('contact');
        } else {
            //return contact form with errors
            //return back()->withErrors($validator->errors());
            //$url = request()->headers->get('referer');
            $urlBack = redirect()->back()->getTargetUrl();
            return redirect($urlBack . '#contato2')->withErrors($validator->errors());
        }
    }
}
