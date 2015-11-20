<?php

use Illuminate\Database\Seeder;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Administrador',
            'last_name' =>'Administrador',
            'last_name_m' =>'Administrador',
            'email' =>'admin@admin.com',
            'username' => 'administrador',
            'email_alter' =>'administrador',
            'password' =>bcrypt('123'),
            'password_two'=>bcrypt('123'),
            'role_id' =>1

        ]);

        factory(User::class,19)->create();

    }
}
