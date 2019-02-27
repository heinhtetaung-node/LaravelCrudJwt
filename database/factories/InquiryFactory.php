<?php
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Models\Inquiry::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'url' => $faker->domainName,
        'message' => $faker->paragraph,
        'gender' => $faker->randomElement(['male', 'female']),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
    ];
});
