<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
		'title' => $faker->sentence(4),
		'description' => $faker->realText(500),
		'posted_at' => $faker->date()
    ];
});
