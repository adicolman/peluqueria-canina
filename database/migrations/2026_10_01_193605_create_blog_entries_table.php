<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crea la tabla "blog_entries".
     */
    public function up(): void
    {
        Schema::create('blog_entries', function (Blueprint $table) {
            $table->id('blog_entry_id');
            $table->string('title', 100);

            // Extracto breve para el listado del blog.
            $table->string('excerpt');

            $table->text('content');
            $table->string('category', 50);

            // Portada propia; vacía => usa la imagen de la categoría.
            $table->string('image')->nullable();

            // Fecha de publicación, distinta de created_at.
            $table->date('published_at');

            // Borrador (false) o publicada (true).
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Elimina la tabla "blog_entries".
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_entries');
    }
};
