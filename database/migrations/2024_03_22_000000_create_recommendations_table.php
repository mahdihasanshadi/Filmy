<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('movie_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('series_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('message')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamps();

            // Ensure a user can't recommend the same movie/series to the same friend multiple times
            $table->unique(['sender_id', 'receiver_id', 'movie_id'], 'unique_movie_recommendation');
            $table->unique(['sender_id', 'receiver_id', 'series_id'], 'unique_series_recommendation');
        });
    }

    public function down()
    {
        Schema::dropIfExists('recommendations');
    }
};
