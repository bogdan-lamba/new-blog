<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => '1',
        'category_id' => random_int(1,3),
        'title' => ucfirst($faker->word),
        'content' => $faker->text(1000),
        'created_at' => now(),
        'updated_at' => now()
    ];
});
