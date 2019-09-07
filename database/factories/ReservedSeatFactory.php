<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\ReservedSeat;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(ReservedSeat::class, function (Faker $faker) {
    return [
        'customer_name' => $faker->name,
        'customer_last_name' => $faker->lastName,
        'reservedAt' => now(),
        'phone_number' => $faker->phoneNumber,
        'pdf' => Str::random(10),
        'conference_room_id' => 1
    ];
});
