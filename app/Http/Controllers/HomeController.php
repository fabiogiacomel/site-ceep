<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Westsoft\Acl\Models\Permission;
use Westsoft\Acl\Models\ProfilePermissions;
use Westsoft\Acl\Models\UserProfiles;
use App\Models\User;
use App\Models\Usuario;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function create(Request $request)
    {
        $data = $request->all();

        $user = User::where('email', $data['email'])->first();
    
        if($user !== null){
            return retorno('Esse nome de usuário já existe!',500);

        }
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return retorno('Usuário criado com sucesso!',200);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Pegar o tipo do usuário
        $user = Auth::user();
        $usuarios_old = Usuario::where('usuario', $user->email)->first();
        if(!$usuarios_old){
            $tipo = 1;
        }else{
            $tipo = $usuarios_old->tipo;
        }
        //Seta valor na sessão para sistemas legados
        session_start();
        $_SESSION['idusuario'] = Auth::id();
        $_SESSION['usuario']   = Auth::user()->name;
        $_SESSION['logado']    = "SIM";
        $_SESSION['tipo']      = $tipo;

       /*  $request->session()->put('idusuario', Auth::id());
        $request->session()->put('usuario', Auth::user()->name);
        $request->session()->put('logado', "SIM");
 */
        /**
         *  Pega o Id do usuário logado no momento,
         *  só chegara neste método se estiver logado protegido
         *  pelo middleware auth no construtor.
         */
        $id = Auth::id();

        /**
         *  Busca todos os profiles que estão relacionados com o usuário logado
         */
        $profiles_user = UserProfiles::where('user_id', '=', $id)->get();

        $permissions = array();
        /**
         *  Para cada perfil do usuario busca as permissões
         */

        foreach ($profiles_user as $pu) {
            //dd($pu);
            $_SESSION['tipo'] = $pu->profiles_id;
            $profile_permissions = ProfilePermissions::where('profiles_id', $pu->profiles_id)->get();
            /**
             * Permissão do perfil busca o nome
             */
            foreach ($profile_permissions as $pp) {
                $aux = Permission::where('id', $pp->permissions_id)->first();
                /**
                 * Nome da permissão, ex: users.store
                 */
                $permissions[] = $aux->name;
            }
        }
        //Habilitarpara ver as permissões
        //dd($permissions);

        /**
         *  session()->put() - Cria o array com as permissões na sessão.
         */
        $request->session()->put('permissions', $permissions);
       // dd($permissions);
        /**
         *  Segurança: session->regenerate() - Ao fazer isso mesmo que a sessão seja
         *  roubada estará seguro pois a partir do momento que faz isso o identificador
         *  da sessão muda e automaticamente inválida a versão anterior.
         */
        $request->session()->regenerate();
        return view('home');
    }
}
