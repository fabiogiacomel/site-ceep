<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('users.index', compact('users'));
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$usuarios_old = Usuario::get();

        //dd($usuarios_old);

        $count =0;
        foreach ($usuarios_old as $key => $user) {
            User::create([
                'name' =>  $user['nome'],
                'email' => $user['usuario'],
                'password' => Hash::make($user['senha']),
            ]);
            $count++;
        }
        echo "$count usuários criados";
        dd($count);*/
    }
    
    public function load_profiles()
    {
        $usuarios_old = Usuario::get();

        //dd($usuarios_old);

        $count = 0;
        foreach ($usuarios_old as $key => $user) {
            User::create([
                'name' =>  $user['nome'],
                'email' => $user['usuario'],
                'password' => Hash::make($user['senha']),
            ]);
            $count++;
        }
        echo "$count usuários criados";
        dd($count);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.create-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $dados = $request->all();

        $dados['password'] = Hash::make($dados['password']);
        $user->update($dados);
        return redirect()->action('UsuarioController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
