<?php

use Illuminate\Database\Seeder;

class permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'profiles.index',  'description' => 'Exibir tela de perfis'],
            ['name' => 'profiles.show',   'description' => 'Exibir detalhes do perfil'],
            ['name' => 'profiles.edit',   'description' => 'Exibir tela de edição de perfil'],
            ['name' => 'profiles.create', 'description' => 'Exibir tela de cadastro de perfil'],
            ['name' => 'profiles.store',  'description' => 'Incluir novo perfil'],
            ['name' => 'profiles.update', 'description' => 'Alterar um perfil'],
            ['name' => 'profiles.destroy','description' => 'Excluir um perfil'],

            ['name' => 'permissions.index',  'description' => 'Exibir tela de permissões'],
            ['name' => 'permissions.show',   'description' => 'Exibir detalhes da permissão'],
            ['name' => 'permissions.edit',   'description' => 'Exibir tela de edição de permissão'],
            ['name' => 'permissions.create', 'description' => 'Exibir tela de cadastro de permissão'],
            ['name' => 'permissions.store',  'description' => 'Incluir nova permissão'],
            ['name' => 'permissions.update', 'description' => 'Alterar um permissão'],
            ['name' => 'permissions.destroy','description' => 'Excluir um permissão'],
            
            ['name' => 'profile_permissions.index',  'description' => 'Exibir tela de permissões do perfis'],
            ['name' => 'profile_permissions.show',   'description' => 'Exibir detalhes das permissões do perfil'],
            ['name' => 'profile_permissions.edit',   'description' => 'Exibir tela de edição das permissões do perfil'],
            ['name' => 'profile_permissions.create', 'description' => 'Exibir tela de cadastro das permissões do perfil'],
            ['name' => 'profile_permissions.store',  'description' => 'Incluir nova permissão do perfil'],
            ['name' => 'profile_permissions.update', 'description' => 'Alterar uma permissões do perfil'],
            ['name' => 'profile_permissions.destroy','description' => 'Excluir uma permissões do perfil'],

            ['name' => 'user_profiles.index',  'description' => 'Exibir tela de perfis do usuário'],
            ['name' => 'user_profiles.show',   'description' => 'Exibir detalhes do perfil do usuário'],
            ['name' => 'user_profiles.edit',   'description' => 'Exibir tela de edição de perfil do usuário'],
            ['name' => 'user_profiles.create', 'description' => 'Exibir tela de cadastro de perfil do usuário'],
            ['name' => 'user_profiles.store',  'description' => 'Incluir novo perfil do usuário'],
            ['name' => 'user_profiles.update', 'description' => 'Alterar um perfil do usuário'],
            ['name' => 'user_profiles.destroy','description' => 'Excluir um perfil do usuário'],
        ]);
        
    }
}
