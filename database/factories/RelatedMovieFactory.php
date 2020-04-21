<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Movie;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

DB::table('movies_tags')->insert(
    [
        'movie_id' => App\Movie::select('id')->orderByRaw("RAND()")->first()->id,
        'tag_id' => App\Tag::select('id')->orderByRaw("RAND()")->first()->id,
    ]
);
