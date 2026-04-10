<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('google_books_id')->unique();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->json('authors')->nullable();
            $table->string('publisher')->nullable();
            $table->date('published_date')->nullable();
            $table->text('description')->nullable();
            $table->string('isbn')->nullable();
            $table->integer('page_count')->nullable();
            $table->json('categories')->nullable();
            $table->string('language', 10)->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('small_thumbnail')->nullable();
            $table->string('preview_link')->nullable();
            $table->string('info_link')->nullable();
            $table->boolean('is_favorite')->default(false);
            $table->timestamps();
            
            $table->index('title');
            $table->index('is_favorite');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};