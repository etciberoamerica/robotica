<?php

use Illuminate\Database\Seeder;
use App\RelationTeUs;
use App\Team;
use Faker\Factory  as Faker;
use App\User;

class RelationTeamUseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(Team::get() as $te){

            RelationTeUs::create([
                'team_id'               => $te->id,
                'user_coach_id'         => $faker->numberBetween(1,count(User::get())),
                'user_coach_aux_id'     => $faker->numberBetween(1,count(User::get())),
                'user_coordinador_id'   => $faker->numberBetween(1,count(User::get())),
                'user_cap_id'           => $faker->numberBetween(1,count(User::get())),
                'user_int2_id'          => $faker->numberBetween(1,count(User::get())),
                'user_int3_id'          => $faker->numberBetween(1,count(User::get())),
                'user_int4_id'          => $faker->numberBetween(1,count(User::get())),
            ]);
        }

    }
}
