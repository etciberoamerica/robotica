<?php

use Illuminate\Database\Seeder;

use App\User;
use App\RelationUseSta;

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
            'password_two'=>base64_encode('123'),
            'role_id' =>1
        ]);


        User::create([
            'name' => 'Coach',
            'last_name' =>'Coach',
            'last_name_m' =>'Coach',
            'email' =>'Coach@Coach.com',
            'username' => 'coach',
            'email_alter' =>'Coach',
            'password' =>bcrypt('123'),
            'password_two'=>base64_encode('123'),
            'role_id' =>2
        ]);

        User::create([
            'name' => 'Coach_aux',
            'last_name' =>'Coach_aux',
            'last_name_m' =>'Coach_aux',
            'email' =>'Coach_aux@Coach.com',
            'username' => 'coach_aux',
            'email_alter' =>'Coach',
            'password' =>bcrypt('123'),
            'password_two'=>base64_encode('123'),
            'role_id' =>3
        ]);

        User::create([
            'name' => 'Coordinador',
            'last_name' =>'Coordinador',
            'last_name_m' =>'Coordinador',
            'email' =>'Coordinador@Coach.com',
            'username' => 'coordinador',
            'email_alter' =>'coordinador',
            'password' =>bcrypt('123'),
            'password_two'=>base64_encode('123'),
            'role_id' =>4
        ]);

        User::create([
            'name' => 'capitan',
            'last_name' =>'capitan',
            'last_name_m' =>'capitan',
            'email' =>'capitan@Coach.com',
            'username' => 'capitan',
            'email_alter' =>'capitan',
            'password' =>bcrypt('123'),
            'password_two'=>base64_encode('123'),
            'role_id' =>5
        ]);

        User::create([
            'name' => 'inte_two',
            'last_name' =>'inte_two',
            'last_name_m' =>'inte_two',
            'email' =>'inte_two@Coach.com',
            'username' => 'inte_two',
            'email_alter' =>'inte_two',
            'password' =>bcrypt('123'),
            'password_two'=>base64_encode('123'),
            'role_id' =>6
        ]);

        User::create([
            'name' => 'inte_three',
            'last_name' =>'inte_three',
            'last_name_m' =>'inte_three',
            'email' =>'inte_three@Coach.com',
            'username' => 'inte_three',
            'email_alter' =>'inte_three',
            'password' =>bcrypt('123'),
            'password_two'=>base64_encode('123'),
            'role_id' =>7
        ]);

        User::create([
            'name' => 'inte_four',
            'last_name' =>'inte_four',
            'last_name_m' =>'inte_four',
            'email' =>'inte_four@Coach.com',
            'username' => 'inte_four',
            'email_alter' =>'inte_four',
            'password' =>bcrypt('123'),
            'password_two'=>base64_encode('123'),
            'role_id' =>8
        ]);

        User::create([
            'name' => 'arbitro',
            'last_name' =>'arbitro',
            'last_name_m' =>'arbitro',
            'email' =>'arbitro@Coach.com',
            'username' => 'arbitro',
            'email_alter' =>'arbitro',
            'password' =>bcrypt('123'),
            'password_two'=>base64_encode('123'),
            'role_id' =>9
        ]);

        RelationUseSta::create([
            'user_id' =>9,
            'challenge_id_1' =>1,
            'stage_id_1' =>1,
            'challenge_id_2' =>1,
            'stage_id_2' =>1
        ]);
        factory(User::class,80)->create();

    }
}
