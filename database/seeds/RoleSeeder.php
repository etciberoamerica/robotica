<?php

use Illuminate\Database\Seeder;
Use App\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'Administrador'
        ]);
        Role::create([
            'name'=>'Coach'
        ]);
        Role::create([
            'name'=>'Coach Auxiliar'
        ]);
        Role::create([
            'name'=>'Coordinador'
        ]);

        Role::create([
            'name'=>'Capitan'
        ]);

        Role::create([
            'name'=>'Integrante dos'
        ]);

        Role::create([
            'name'=>'Integrante tres'
        ]);

        Role::create([
            'name'=>'Integrante cuatro'
        ]);

    }
}
