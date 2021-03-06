<?php

/** @var Factory $factory */

use App\Models\Employee;
use App\Models\Marketplace;
use App\Models\User;
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

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'UserID' => factory(User::class),
        'MarketplaceID' => factory(Marketplace::class),
        'Nationality' => $faker->randomElement(['سعودي', 'مصري', 'سوداني', 'امارتي']),
        'JobTitle' => $faker->randomElement(['محاسب', 'امين خزنه', 'مشرف']),
        'NationalID' => $faker->numerify('###############'),
        'PhoneNumber' => $faker->phoneNumber,
        'ProfileImage' => $faker->imageUrl(),
        'IdentityImage' => $faker->imageUrl(),
        'EmploymentContractImage' => $faker->imageUrl(),
        'IBAN' => $faker->iban(),
        'Sex' => $faker->randomElement($array = array('ذكر', 'انثي')),
        'Salary' => $faker->randomFloat(5, 10000, 90000),
    ];
});
