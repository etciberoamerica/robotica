<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\RoundController as Con;

class RondaPruebasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Con::index(1,['y'=>0,'time_start'=>0,'time_end'=>0],1);
        Con::index(2,['y'=>0,'time_start'=>0,'time_end'=>0],1);
        Con::index(3,['y'=>0,'time_start'=>0,'time_end'=>0],1);
        Con::index(4,['y'=>0,'time_start'=>0,'time_end'=>0],1);
        Con::index(5,['y'=>0,'time_start'=>0,'time_end'=>0],1);
        Con::index(7,['y'=>0,'time_start'=>0,'time_end'=>0],1);
        Con::index(8,['y'=>0,'time_start'=>0,'time_end'=>0],1);
    }
}
