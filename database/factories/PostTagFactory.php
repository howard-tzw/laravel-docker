<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PostTag;
use Faker\Generator as Faker;

$factory->define(PostTag::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(0, 1),
        'tag_id' => $faker->numberBetween(0, 1)
    ];
});
