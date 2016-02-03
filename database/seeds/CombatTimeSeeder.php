<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\CombatRoundController as Combat;

class CombatTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Combat::getindex(1);
        Combat::getindex(2);
        Combat::getindex(3);
        Combat::getindex(4);
        Combat::getindex(5);
        Combat::getindex(7);
        Combat::getindex(8);
    }
}
