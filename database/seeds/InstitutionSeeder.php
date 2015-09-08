<?php

use Illuminate\Database\Seeder;

use App\Institution;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Institution::class,1000)->create();
    }
}
