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
    $faker->addProvider(new Faker\Provider\kk_KZ\Person($faker));
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'home_phone' => $faker->phoneNumber,
        'mobile_phone' => $faker->phoneNumber,
        'serial_number' => $faker->individualIdentificationNumber,
        'address' => $faker->address,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Itemlist::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'title' => $faker->sentence,
        'descrp'=> $faker->text,
        'lon' => $faker->latitude,
        'lat' => $faker->longitude,
        'image' => 'test.jpg',
        'video' => 'test.mov',
        'type' => 'OTHER',
        'process' => 'unprocessed',
    ];
});
