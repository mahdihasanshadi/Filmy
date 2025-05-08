<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('actor_series', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('actor_id');
            $table->unsignedBigInteger('series_id');
            $table->timestamps();

            $table->foreign('actor_id')
                ->references('id')
                ->on('actors')
                ->onDelete('cascade');

            $table->foreign('series_id')
                ->references('id')
                ->on('series')
                ->onDelete('cascade');

            $table->unique(['actor_id', 'series_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('actor_series');
    }
};
