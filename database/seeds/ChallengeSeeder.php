<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


use App\Challenge;
use Faker\Factory as factory;

class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Challenge::create([
                'name' =>'Sumo robotizado NXT',
                'duration' =>'20',
                'challenge_duration'=>'2',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);

        Challenge::create([
                'name' =>'Sumo robotizado EV3',
                'duration' =>'20',
                'challenge_duration'=>'2',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);

        Challenge::create([
                'name' =>'Futbol robotizado NXT',
                'duration' =>'20',
                'challenge_duration'=>'4',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);
        Challenge::create([
                'name' =>'Futbol robotizado EV3',
                'duration' =>'20',
                'challenge_duration'=>'4',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);
        Challenge::create([
                'name' =>'Blockrise',
                'duration' =>'20',
                'challenge_duration'=>'3',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);
        Challenge::create([
                'name' =>'Reto sorpresa',
                'duration' =>'20',
                'challenge_duration'=>'2',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);
        Challenge::create([
                'name' =>'Taekwondo robotizado',
                'duration' =>'20',
                'challenge_duration'=>'3',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);
        Challenge::create([
                'name' =>'Carrera de obstáculos',
                'duration' =>'20',
                'challenge_duration'=>'3',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);
    }
}
