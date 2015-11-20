<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(StageSeeder::class);
        $this->call(InstitutionSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(DegreeSeeder::class);
        $this->call(RootSeeder::class);
        $this->call(RelationrodeSeeder::class);
        $this->call(ChallengeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(SettingsSeeder::class);
        Model::reguard();
    }
}
