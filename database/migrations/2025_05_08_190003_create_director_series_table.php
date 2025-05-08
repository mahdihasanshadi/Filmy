<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('director_series', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('director_id');
            $table->unsignedBigInteger('series_id');
            $table->timestamps();

            $table->foreign('director_id')
                ->references('id')
                ->on('directors')
                ->onDelete('cascade');

            $table->foreign('series_id')
                ->references('id')
                ->on('series')
                ->onDelete('cascade');

            $table->unique(['director_id', 'series_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('director_series');
    }
};
