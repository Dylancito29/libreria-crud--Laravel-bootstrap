<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

// ANALOGY: This is the "Mask Workshop".
// Here we define what a standard fake user looks like, sounds like, and behaves like.
// When the Seeder asks for 10 users, it will use this mold 10 times.
$factory->define(User::class, function (Faker $faker) {
    return [
        
        'name' => $faker->name, // A realistic fake name (e.g. "John Doe")
        'email' => $faker->unique()->safeEmail, // A unique email (e.g. "jdoe@example.org")
        'email_verified_at' => now(), // Verified "right now".
        // password: '$2y$10$92IX UNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password (original commented)
        // By default, the password will always be "password" for everyone (so we don't forget the test key).
        // Hash::make encrypts the password so it's not readable in the DB.
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'remember_token' => Str::random(10), // A random string for the "remember me" session.
        
        // We assign a random default role (1 or 2) so it's not null. (Optional, but useful).
         'role_id' => $faker->numberBetween(1,2),
    ];
});
