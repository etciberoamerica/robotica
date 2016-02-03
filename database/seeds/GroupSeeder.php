<?php

use Illuminate\Database\Seeder;
use App\Group;
use App\Challenge;
use Faker\Factory  as Faker;
use App\Team;
use App\Stage;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Group::class,100)->create();

        for($i=1;$i <= count(Challenge::get()); $i++){
            $this->group($i);
        }

    }

    public function group($id){
        $faker = Faker::create();
        $counTeam =count(Team::where('challenge_id','=',$id)->get());



        if($counTeam < 24){
            $crea =4;
        }else if($counTeam >= 24){
            $crea= 8;
        }
        $sta = Stage::where('challenge_id','=',$id)->where('back','=',0)->get()->toArray();


        $y=0;
        for($i=1; $i <= $crea; $i++){

            if($y == count($sta) - 1){
                $y=0;
            }

            Group::create(
                [
                    'name'          =>  'Grupo '.$i,
                    'challenge_id'  =>  $id,
                    'stage_id'      => $sta[$y]['id'],
                ]
            );

            $y++;

        }

    }
}
