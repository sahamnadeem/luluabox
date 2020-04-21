<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelatedMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('movies_id');
            $table->foreign('movies_id')
                ->references('id')
                ->on('movies')
                ->onDelete('cascade');
            $table->unsignedBigInteger('rmovie_id');
            $table->foreign('rmovie_id')
                ->references('id')
                ->on('movies')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('related_movies');
    }
}
