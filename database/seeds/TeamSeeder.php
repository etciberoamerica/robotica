<?php

use Illuminate\Database\Seeder;

use App\Team;
use App\Challenge;
use App\Degree;
use Faker\Factory  as Faker;
use App\Institution;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //factory(Team::class,800)->create();
        for($i=1;$i <= count(Challenge::get()); $i++){
            $this->team($i);

        }

    }

    public function team($id){
        $faker = Faker::create();

        for($i=1; $i <= $faker->numberBetween(24,30); $i++){
            Team::create([
                'institution_id'    =>$faker->numberBetween('1',count(Institution::get())),
                'name'              =>'Team '.$i,
                'name_altered'      =>'Team '.$i,
                'robot_name'        =>'Robot '.$i,
                'gender'            =>$faker->randomElement(['MAS','FEM','MIX']),
                'challenge_id'      =>$id,
                'degree_id'         =>$faker->numberBetween('1',count(Degree::get())),
            ]);
        }
    }

}
