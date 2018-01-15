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

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->sentence(5);
    $slug = str_slug($title);
    return [
        'user_id' => random_int(1,50),
        'category_id' => random_int(1,5),
        'slug' => $slug,
        'title' => $title,
        'text' => $faker->text(100),
        'created_at' => $faker->date(),
        'updated_at' => $faker->date()
    ];
});
