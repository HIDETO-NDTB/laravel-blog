<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(3);
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'content' => $faker->paragraph(3),
        'featured' => asset('uploads/posts/sample.jpg'),
        'category_id' => $faker->randomDigit
    ];
});
