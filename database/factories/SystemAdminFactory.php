<?php

/** @var Factory $factory */

use App\Models\SystemAdmin;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
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

$factory->define(SystemAdmin::class, function (Faker $faker) {
    return [
            'UserID' => factory(\App\Models\User::class),
            'Phone' =>$faker->phoneNumber,
            'SoftwareVersion' =>$faker->randomFloat(1,2,9),
            'SerialKey' =>$faker->ipv6
    ];
});
