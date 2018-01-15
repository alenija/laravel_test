<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Comment::class, function (Faker $faker) {

    return [
        'user_id' => random_int(1,50),
        'post_id' => random_int(1,10),
        'text' => $faker->text(50),
        'created_at' => $faker->date(),
        'updated_at' => $faker->date()
    ];
});
