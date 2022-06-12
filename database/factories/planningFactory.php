<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Planning;
use Faker\Generator as Faker;

$factory->define(Planning::class, function (Faker $faker) {
    return [
        //
            'cat_id' => 1,
            'kode_kegiatan' => $this->faker->unique()->randomDigit,
            'nama_kegiatan' => $this->faker->name(),
            'harga_satuan' => $this->faker->unique()->randomDigit,
            'jumlah' => $this->faker->unique()->randomDigit,
    ];
});
