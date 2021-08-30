<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'post_title' => $faker->title,
        'post_slug' => Str::slug($faker->title),
        'user_id' => 1,

    ];
});
