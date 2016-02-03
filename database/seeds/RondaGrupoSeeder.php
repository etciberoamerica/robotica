<?php

use Illuminate\Database\Seeder;
use App\Http\Controllers\GroupstaController as Group;



class RondaGrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::index(1);
        Group::index(2);
        Group::index(3);
        Group::index(4);
        Group::index(5);
        Group::index(7);
        Group::index(8);

    }
}
