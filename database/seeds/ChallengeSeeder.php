<?php

use Illuminate\Database\Seeder;


use App\Challenge;
class ChallengeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Challenge::create([
            'name' =>'Sumo robotizado NXT'
        ]);
        Challenge::create([
            'name' =>'Sumo robotizado EV3'
        ]);
        Challenge::create([
            'name' =>'Futbol robotizado NXT'
        ]);
        Challenge::create([
            'name' =>'Futbol robotizado EV3'
        ]);
        Challenge::create([
            'name' =>'Blockrise'
        ]);
        Challenge::create([
            'name' =>'Reto sorpresa'
        ]);
        Challenge::create([
            'name' =>'Taekwondo robotizado'
        ]);
        Challenge::create([
            'name' =>'Carrera de obstáculos'
        ]);


    }
}
