<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
use App\Challenge;
use App\Institution;
use App\Degree;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});



$factory->define(App\Institution::class, function (Faker\Generator $faker) {
    $faker->addProvider(new Faker\Provider\en_US\Address($faker));
    return [
        'name'          => 'Instituto '.$faker->country,
        'user_id'       => 1,
        'mas'           =>$faker->randomElement([0,1]),
        'fem'           =>$faker->randomElement([0,1]),
        'mix'           =>$faker->randomElement([0,1]),
        'active'        =>$faker->randomElement([0,1]),
        'country_id'    =>$faker->randomElement([32,76,
152,
188,
218,
222,
320,
340,
484,
558,
591,
600,
604,
620,
724,
840,
858
,859]),
        'state_id'      =>$faker->randomElement([1,10]),
        'city_id'       =>$faker->randomElement([1,10]),
    ];
});


$factory->define(App\Stage::class, function(Faker\Generator $faker){

    $faker->addProvider(new Faker\Provider\Internet($faker));
    return [
        'name' => $faker->userName,
        'challenge_id' => $faker->numberBetween(1,8)
    ];



});

$factory->define(App\Group::class,function(Faker\Generator $faker){


    $faker->addProvider(new Faker\Provider\DateTime($faker));

  // dd(count(Challenge::get()));

    return [
        'name'          =>  $faker->century,
        'challenge_id'  =>  $faker->numberBetween('1',count(Challenge::get())),
        'active'        =>  $faker->numberBetween('0','1')
    ];

});




$factory->define(App\User::class,function(Faker\Generator $faker){
    return [
        'name'          =>  $faker->name,
        'last_name'     =>  $faker->lastName,
        'last_name_m'   =>  $faker->lastName,
        'email'         =>  $faker->unique()->email,
        'username'      =>  $faker->unique()->userName,
        'email_alter'   =>  $faker->email,
        'password'      => bcrypt('123'),
        'password_two'  => base64_encode('123'),
        'role_id'       => 1

    ];

});


$factory->define(App\Team::class,function(Faker\Generator $faker){
    return[
        'institution_id'    =>$faker->numberBetween('1',count(Institution::get())),
        'name'              =>$faker->name,
        'name_altered'      =>$faker->name,
        'robot_name'        =>$faker->userName,
        'gender'            =>$faker->randomElement(['MAS','FEM','MIX']),
        'challenge_id'      =>$faker->numberBetween('1',count(Challenge::get())),
        'degree_id'         =>$faker->numberBetween('1',count(Degree::get())),
    ];
});