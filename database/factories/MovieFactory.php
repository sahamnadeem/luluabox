<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Movie;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'director'=>$faker->name,
        'writer'=>$faker->name,
        'story'=>$faker->name,
        'detail'=>$faker->text,
        'price'=>rand(300,500),
        'category_id'=>rand(1,7),
        'genre_id'=>rand(1,25),
        'cover'=>'https://cdn.cinematerial.com/p/297x/mabrnnrl/annihilation-british-movie-poster-md.jpg',
        'trailer'=>'https://cdn.cinematerial.com/p/297x/mabrnnrl/annihilation-british-movie-poster-md.jpg'
    ];
});
