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
        'name'      => 'Instituto '.$faker->country,
        'user_id'   => 1,
        'mas'       =>$faker->randomElement([0,1]),
        'fem'       =>$faker->randomElement([0,1]),
        'mix'       =>$faker->randomElement([0,1]),
        'active'    => $faker->randomElement([0,1])
    ];
});


$factory->define(App\Stage::class, function(Faker\Generator $faker){
    $faker->addProvider(new Faker\Provider\Internet($faker));
    return [
        'name' => $faker->userName
    ];

});