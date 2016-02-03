<?php

use Illuminate\Database\Seeder;
use Faker\Factory  as Faker;
use App\CombatRound;
use App\BlockRise;
use Faker\Provider\DateTime;

class BlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        //$faker->addProvider(new Faker\Provider\DateTime($faker));




        $data = CombatRound::where('challenge_id','=',5)->get();
        foreach($data as $d){
            $time1 = DateTime::time($format = 'H:i:s', $max = '00:02:00');
            $time2 = DateTime::time($format = 'H:i:s', $max = '00:02:00');
            $zonaRoja1  = $faker->numberBetween($min = 2, $max = 5);
            $nZonaRojo1  = $zonaRoja1 + 1;
            $zonaVerde1 = $faker->numberBetween($min = 1, $max = 5);
            $nZonaVerde1 = $zonaVerde1 + 1;
            $zonaAzul1  = $faker->numberBetween($min = 2, $max = 5);
            $nZonaAzul1 = $zonaAzul1 +1;

            $zonaRoja2  = $faker->numberBetween($min = 2, $max = 5);
            $nZonaRojo2  = $zonaRoja2 + 1;
            $zonaVerde2 = $faker->numberBetween($min = 1, $max = 5);
            $nZonaVerde2 = $zonaVerde2 + 1;
            $zonaAzul2  = $faker->numberBetween($min = 2, $max = 5);
            $nZonaAzul2 = $zonaAzul2 +1;

            BlockRise::create([
                'combat_id'         =>$d['id'],
                'team_id_1'         =>$d['versus_one'],
                'time_team_1'       =>$time1,
                'zon_pun_roj_1'     =>$zonaRoja1,
                'num_api_roj_1'     =>$nZonaRojo1,
                'zon_pun_ver_1'     =>$zonaVerde1,
                'num_api_ver_1'     =>$nZonaVerde1,
                'zon_pun_azu_1'     =>$zonaAzul1,
                'num_api_azu_1'     =>$nZonaAzul1,
                'team_id_2'         =>$d['versus_two'],
                'time_team_2'       =>$time2,
                'zon_pun_roj_2'     =>$zonaRoja2,
                'num_api_roj_2'     =>$nZonaRojo2,
                'zon_pun_ver_2'     =>$zonaVerde2,
                'num_api_ver_2'     =>$nZonaVerde2,
                'zon_pun_azu_2'     =>$zonaAzul2,
                'num_api_azu_2'     =>$nZonaAzul2
            ]);
        }


    }
}
