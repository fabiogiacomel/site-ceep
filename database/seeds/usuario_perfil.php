<?php

use Illuminate\Database\Seeder;

class usuario_perfil extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_profiles')->insert([
            'user_id' => '1',
            'profiles_id' => '1',
        ]);
    }
}
