<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Hat;
use Faker\Generator as Faker;

$factory->define(Hat::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'name' => 'Name'
    ];
});
