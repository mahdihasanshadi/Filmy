<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('director_movie', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('director_id');
            $table->unsignedBigInteger('movie_id');
            $table->timestamps();

            $table->foreign('director_id')
                ->references('id')
                ->on('directors')
                ->onDelete('cascade');

            $table->foreign('movie_id')
                ->references('id')
                ->on('movies')
                ->onDelete('cascade');

            $table->unique(['director_id', 'movie_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('director_movie');
    }
};
