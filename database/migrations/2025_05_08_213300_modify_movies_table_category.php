<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // First, drop the foreign key constraint
        Schema::table('movies', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        // Then modify the column to be nullable
        DB::statement('ALTER TABLE movies MODIFY category_id BIGINT UNSIGNED NULL');

        // Finally, add back the foreign key with SET NULL on delete
        Schema::table('movies', function (Blueprint $table) {
            $table->foreign('category_id')
                  ->references('id')
                  ->on('movie_categories')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // First, drop the foreign key constraint
        Schema::table('movies', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        // Then modify the column to be non-nullable
        DB::statement('ALTER TABLE movies MODIFY category_id BIGINT UNSIGNED NOT NULL');

        // Finally, add back the foreign key with CASCADE on delete
        Schema::table('movies', function (Blueprint $table) {
            $table->foreign('category_id')
                  ->references('id')
                  ->on('movie_categories')
                  ->onDelete('cascade');
        });
    }
};
