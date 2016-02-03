<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\CombatRoundController as Combat;

class CombatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Combat::index(1);
        Combat::index(2);
        Combat::index(3);
        Combat::index(4);
        Combat::index(5);
        Combat::index(7);
        Combat::index(8);

    }
}
