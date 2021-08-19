<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([usuario::class, permission::class, perfil::class, usuario_perfil::class, perfil_permission::class]);
    }
}
