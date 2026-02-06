<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    // Closed list of "flavors" available for our categories.
    // We use this instead of random words so the data looks real.
    $categories = ['Fiction','Science','History','Biography','Children','Fantasy','Romance','Horror'];
    return [
        // randomElement reaches into the bag and pulls out one of the genres.
        'name' => $faker->randomElement($categories)
    ];
});
