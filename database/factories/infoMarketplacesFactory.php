<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\Marketplaces;
use Faker\Generator as Faker;

$factory->define(Marketplaces::class, function (Faker $faker) {

    return [
        'MarketplaceOwnerID' => $faker->word,
        'Name' => $faker->word,
        'Country' => $faker->word,
        'City' => $faker->word,
        'SupervisorPhoneNumber' => $faker->word,
        'Address' => $faker->word,
        'TaxNumber' => $faker->word,
        'Email' => $faker->word,
        'Latitude' => $faker->word,
        'Longitude' => $faker->word,
        'SafeBalance' => $faker->randomDigitNotNull,
        'CompanyRegisterImage' => $faker->word,
        'Logo' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});