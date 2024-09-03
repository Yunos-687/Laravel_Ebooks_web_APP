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
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Automatically creates an auto-incrementing primary key column
            $table->string('title');
            $table->string('author', 100);
            $table->string('genre', 50);
            $table->integer('publication_year');
            $table->string('isbn', 20);
            $table->string('pdf_file'); // Handling LONGBLOB as binary
            $table->string('cover_image');
            $table->text('description');
            $table->timestamps(); // Optional, for created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
