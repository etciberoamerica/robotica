<?php

use Illuminate\Database\Seeder;
use App\Stage;

use App\Group;
use App\Challenge;
use Faker\Factory  as Faker;
use App\Team;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i <= count(Challenge::get()); $i++){
            $this->stage($i);

        }



        //factory(Stage::class,40)->create();
    }

    public function stage($id){
        $faker = Faker::create();
        for($i=1; $i <= $faker->numberBetween(3,4); $i++){

            if($i == 4){
                $b =1;
            }else{
                $b=0;
            }
            Stage::create(
                [
                    'name' => 'Escenario '.$i,
                    'challenge_id' => $id,
                    'back' => $b
                ]);
        }

    }
}
