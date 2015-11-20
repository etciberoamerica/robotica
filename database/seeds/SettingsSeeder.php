<?php

use Illuminate\Database\Seeder;
use App\Settings;
class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create([
            'field' => 'Schedumal_trial',
            'value' => '08:00:00'


        ]);

        Settings::create([
            'field' => 'Duration_trial',
            'value' => '20'

        ]);




    }
}
