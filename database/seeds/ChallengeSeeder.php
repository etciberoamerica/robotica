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
                'duration' =>'10',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);

        Challenge::create([
                'name' =>'Sumo robotizado EV3',
                'duration' =>'10',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);

        Challenge::create([
                'name' =>'Futbol robotizado NXT',
                'duration' =>'10',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);
        Challenge::create([
                'name' =>'Futbol robotizado EV3',
                'duration' =>'10',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);
        Challenge::create([
                'name' =>'Blockrise',
                'duration' =>'10',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);
        Challenge::create([
                'name' =>'Reto sorpresa',
                'duration' =>'10',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);
        Challenge::create([
                'name' =>'Taekwondo robotizado',
                'duration' =>'10',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);
        Challenge::create([
                'name' =>'Carrera de obstáculos',
                'duration' =>'10',
                'schedumal' =>'08:00:00',
                'free_time' =>'30',
            ]);


       /* Challenge::create([
            'name' =>'Sumo robotizado NXT',
            'duration' =>$faker->numberBetween('10','20'),
            'schedumal' =>$faker->time($format = 'H:i:s', $max = 'now'),
            'free_time' =>$faker->numberBetween('30','60'),
        ]);*/
       /* Challenge::create([
            'name' =>'Sumo robotizado EV3',
            'duration' =>$faker->numberBetween('10','20'),
            'schedumal' =>$faker->time($format = 'H:i:s', $max = 'now'),
            'free_time' =>$faker->numberBetween('30','60'),
        ]);*/
       /* Challenge::create([
            'name' =>'Futbol robotizado NXT',
            'duration' =>$faker->numberBetween('10','20'),
            'schedumal' =>$faker->time($format = 'H:i:s', $max = 'now'),
            'free_time' =>$faker->numberBetween('30','60'),
        ]);*/
        /*Challenge::create([
            'name' =>'Futbol robotizado EV3',
            'duration' =>$faker->numberBetween('10','20'),
            'schedumal' =>$faker->time($format = 'H:i:s', $max = 'now'),
            'free_time' =>$faker->numberBetween('30','60'),
        ]);*/
        /*Challenge::create([
            'name' =>'Blockrise',
            'duration' =>$faker->numberBetween('10','20'),
            'schedumal' =>$faker->time($format = 'H:i:s', $max = 'now'),
            'free_time' =>$faker->numberBetween('30','60'),
        ]);
        Challenge::create([
            'name' =>'Reto sorpresa',
            'duration' =>$faker->numberBetween('10','20'),
            'schedumal' =>$faker->time($format = 'H:i:s', $max = 'now'),
            'free_time' =>$faker->numberBetween('30','60'),
        ]);
        Challenge::create([
            'name' =>'Taekwondo robotizado',
            'duration' =>$faker->numberBetween('10','20'),
            'schedumal' =>$faker->time($format = 'H:i:s', $max = 'now'),
            'free_time' =>$faker->numberBetween('30','60'),
        ]);
        Challenge::create([
            'name' =>'Carrera de obstáculos',
            'duration' =>$faker->numberBetween('10','20'),
            'schedumal' =>$faker->time($format = 'H:i:s', $max = 'now'),
            'free_time' =>$faker->numberBetween('30','60'),
        ]);*/


    }
}
