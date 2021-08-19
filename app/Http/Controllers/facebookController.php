<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class facebookController extends Controller
{
    public function index()
    {
        //require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

        $app_id = '371881580335162'; //ceep oficial - 1796820613750766
        $app_secret = '8aeb1b5cee627b0ccd3524af3bb9acc3'; //ceep oficial - 1f2004c453be3a6d413b8ec95f33e57b
        $access_token_url = "https://graph.facebook.com/oauth/access_token?client_id=$app_id&client_secret=$app_secret&grant_type=client_credentials";
        $access_token_data = file_get_contents($access_token_url);
        $access_token_arr = json_decode($access_token_data);
        $access_token = $access_token_arr->access_token;

        $fb = new \Facebook\Facebook([
        'app_id' => $app_id,
        'app_secret' => $app_secret,
        'default_graph_version' => 'v3.2',
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
        $response = $fb->get('ceepcascavel/feed?fields=created_time,full_picture,icon,link,message,name,picture,parent_id,story,type&limit=3&locale=pt_BR', $access_token);
        } catch(\Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        //echo 'Graph returned an error: ' . $e->getMessage();
        //exit;
        } catch(\Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
        }
        $posts = $response->getDecodedBody()['data'];
        //dd($posts);
        return view('noticia.facebook', compact('posts'));
    }
}
