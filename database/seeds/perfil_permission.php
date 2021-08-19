<?php

use Illuminate\Database\Seeder;

class perfil_permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile_permissions')->insert([
            ['profiles_id' => '1', 'permissions_id' => '1'],
            ['profiles_id' => '1', 'permissions_id' => '2'],
            ['profiles_id' => '1', 'permissions_id' => '3'],
            ['profiles_id' => '1', 'permissions_id' => '4'],
            ['profiles_id' => '1', 'permissions_id' => '5'],
            ['profiles_id' => '1', 'permissions_id' => '6'],
            ['profiles_id' => '1', 'permissions_id' => '7'],
            ['profiles_id' => '1', 'permissions_id' => '8'],
            ['profiles_id' => '1', 'permissions_id' => '9'],
            ['profiles_id' => '1', 'permissions_id' => '10'],
            ['profiles_id' => '1', 'permissions_id' => '11'],
            ['profiles_id' => '1', 'permissions_id' => '12'],
            ['profiles_id' => '1', 'permissions_id' => '13'],
            ['profiles_id' => '1', 'permissions_id' => '14'],
            ['profiles_id' => '1', 'permissions_id' => '15'],
            ['profiles_id' => '1', 'permissions_id' => '16'],
            ['profiles_id' => '1', 'permissions_id' => '17'],
            ['profiles_id' => '1', 'permissions_id' => '18'],
            ['profiles_id' => '1', 'permissions_id' => '19'],
            ['profiles_id' => '1', 'permissions_id' => '20'],
            ['profiles_id' => '1', 'permissions_id' => '21'],
            ['profiles_id' => '1', 'permissions_id' => '22'],
            ['profiles_id' => '1', 'permissions_id' => '23'],
            ['profiles_id' => '1', 'permissions_id' => '24'],
            ['profiles_id' => '1', 'permissions_id' => '25'],
            ['profiles_id' => '1', 'permissions_id' => '26'],
            ['profiles_id' => '1', 'permissions_id' => '27'],
            ['profiles_id' => '1', 'permissions_id' => '28'],
        ]);
    }
}
