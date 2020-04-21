<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title'=>'Absurdist/surreal/whimsical'],
            ['title'=>'Action'],
            ['title'=>'Adventure'],
            ['title'=>'Comedy'],
            ['title'=>'Crime'],
            ['title'=>'Drama'],
            ['title'=>'Fantasy'],
            ['title'=>'Historical'],
            ['title'=>'Historical fiction'],
            ['title'=>'Horror'],
            ['title'=>'Magical realism'],
            ['title'=>'Mystery'],
            ['title'=>'Paranoid fiction'],
            ['title'=>'Philosophical'],
            ['title'=>'Political'],
            ['title'=>'Romance'],
            ['title'=>'Saga'],
            ['title'=>'Satire'],
            ['title'=>'Science fiction'],
            ['title'=>'Social'],
            ['title'=>'Speculative'],
            ['title'=>'Thriller'],
            ['title'=>'Urban'],
            ['title'=>'Western'],
            ['title'=>'Animation']
        ];
        DB::table('genres')->insert($data);
    }
}
