<?php

use Illuminate\Database\Seeder;
use App\RelationDeRo;
class RelationrodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RelationDeRo::create([
            'degree_id'     => '1',
            'challenge_id'  => '1',
            'robot_id'      => '1'
        ]);

        RelationDeRo::create([
            'degree_id'     => '1',
            'challenge_id'  => '2',
            'robot_id'      => '2'
        ]);

        RelationDeRo::create([
            'degree_id'     => '2',
            'challenge_id'  => '3',
            'robot_id'      => '1'
        ]);
        RelationDeRo::create([
            'degree_id'     => '2',
            'challenge_id'  => '4',
            'robot_id'      => '2'
        ]);

        RelationDeRo::create([
            'degree_id'     => '3',
            'challenge_id'  => '5',
            'robot_id'      => '3'
        ]);

        RelationDeRo::create([
            'degree_id'     => '4',
            'challenge_id'  => '5',
            'robot_id'      => '3'
        ]);

        RelationDeRo::create([
            'degree_id'     => '3',
            'challenge_id'  => '6',
            'robot_id'      => '4'
        ]);
        RelationDeRo::create([
            'degree_id'     => '4',
            'challenge_id'  => '6',
            'robot_id'      => '4'
        ]);
        RelationDeRo::create([
            'degree_id'     => '5',
            'challenge_id'  => '7',
            'robot_id'      => '5'
        ]);

        RelationDeRo::create([
        'degree_id'     => '6',
        'challenge_id'  => '8',
        'robot_id'      => '5'
    ]);

    }
}
