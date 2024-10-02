<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->text('description');
            $table->foreignId('genre_id')->nullable()->constrained('genres')->onDelete('set null');
            $table->string('cover_image')->nullable();
            $table->boolean('premium')->default(false);
            $table->enum('status', ['an', 'hien'])->default('an');
            $table->enum('status_update', ['dang_ra', 'hoan_thanh'])->default('dang_ra');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};
