<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array(
                "title" => "Enjoyable "),
            array(
                "title" => "Foreign "),
            array(
                "title" => "Written-directed "),
            array(
                "title" => "Brilliant "),
            array(
                "title" => "Emotional "),
            array(
                "title" => "Moving "),
            array(
                "title" => "Well-acted "),
            array(
                "title" => "Beautiful "),
            array(
                "title" => "Absorbing "),
            array(
                "title" => "Powerful "),
            array(
                "title" => "Dramatic "),
            array(
                "title" => "Insightful "),
            array(
                "title" => "Intense "),
            array(
                "title" => "Character-driven "),
            array(
                "title" => "Touching "),
            array(
                "title" => "Mysterious "),
            array(
                "title" => "Challenging "),
            array(
                "title" => "Thrilling "),
            array(
                "title" => "Fun"),
            array(
                "title" => "Violent "),
            array(
                "title" => "Dark"),
            array(
                "title" => "Heart-warming "),
            array(
                "title" => "Adventurous "),
            array(
                "title" => "Suspenseful "),
            array(
                "title" => "Family")
        );
        DB::table('tags')->insert($data);
    }
}
