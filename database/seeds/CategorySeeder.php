<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title'=>'Top Rated'],
            ['title'=>'Trending'],
            ['title'=>'New Release'],
            ['title'=>'Series'],
            ['title'=>"Editor's Choice"],
            ['title'=>'First Pick'],
            ['title'=>'Hot Topics']

        ];
        DB::table('categories')->insert($data);
    }
}
