<?php

use Illuminate\Database\Seeder;

use App\Degree;
class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Degree::create([
            'name'=>'1ero secundaria'
        ]);
        Degree::create([
            'name'=>'2do secundaria'
        ]);
        Degree::create([
            'name'=>'3ero secundaria '
        ]);
        Degree::create([
            'name'=>'1ero bachillerato'
        ]);
        Degree::create([
            'name'=>'2do bachillerato'
        ]);

        Degree::create([
            'name'=>'3ero bachillerato'
        ]);
    }
}
