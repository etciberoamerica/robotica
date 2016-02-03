<?php

use Illuminate\Database\Seeder;
use Faker\Factory  as Faker;
use App\User;
use App\Sumo;
use App\CombatRound;
class SumoCombatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->NXT();
        $this->EV3();

    }

    public function NXT(){
        $faker = Faker::create();
        $data = CombatRound::where('challenge_id','=',1)->get();
        foreach($data as $d){
            $score1 = $faker->numberBetween($min = 2, $max = 3);
            $score2 = $faker->numberBetween($min = 2, $max = 3);
            if($score1 == 3 && $score2 == 3){
                $score1 = $score1 - 1;

            }if($score1 == 2 && $score2 == 2){
                $score2 = $score2 + 1;
            }

            if($score1 > $score2){
                $win =$d['versus_one'];
            }else if($score2 > $score1){
                $win =$d['versus_two'];
            }
            Sumo::create([
                'combat_id'         => $d['id'],
                'team_id_win'       => $win,
                'team_id_one'       =>$d['versus_one'],
                'scort_team_one'    =>$score1,
                'firm_team_one'     =>$faker->numberBetween($min = 1, $max = count(User::get())),
                'team_id_two'       =>$d['versus_two'],
                'scort_team_two'    =>$score2,
                'firm_team_two'     =>$faker->numberBetween($min = 1, $max = count(User::get()))

            ]);
        }
    }

    public function EV3(){
        $faker = Faker::create();
        $data = CombatRound::where('challenge_id','=',1)->get();
        foreach($data as $d){
            $score1 = $faker->numberBetween($min = 2, $max = 3);
            $score2 = $faker->numberBetween($min = 2, $max = 3);
            if($score1 == 3 && $score2 == 3){
                $score1 = $score1 - 1;

            }if($score1 == 2 && $score2 == 2){
                $score2 = $score2 + 1;
            }

            if($score1 > $score2){
                $win =$d['versus_one'];
            }else if($score2 > $score1){
                $win =$d['versus_two'];
            }
            Sumo::create([
                'combat_id'         => $d['id'],
                'team_id_win'       => $win,
                'team_id_one'       =>$d['versus_one'],
                'scort_team_one'    =>$score1,
                'firm_team_one'     =>$faker->numberBetween($min = 1, $max = count(User::get())),
                'team_id_two'       =>$d['versus_two'],
                'scort_team_two'    =>$score2,
                'firm_team_two'     =>$faker->numberBetween($min = 1, $max = count(User::get()))

            ]);
        }
    }
}
