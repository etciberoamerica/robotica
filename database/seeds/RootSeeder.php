<?php

use Illuminate\Database\Seeder;
use App\Robot;
class RootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Robot::create([
            'name'=>'NXT'
        ]);
        Robot::create([
            'name'=>'EV3'
        ]);
        Robot::create([
            'name'=>'VEX IQ'
        ]);
        Robot::create([
            'name'=>'MOWAY'
        ]);
        Robot::create([
            'name'=>'HUMANOIDE HUNO'
        ]);
    }
}
