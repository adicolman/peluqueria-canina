<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crea la tabla "services".
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id('service_id');
            $table->string('name', 100);
            $table->text('description');

            // Precio en centavos (ej: $15.50 => 1550).
            $table->unsignedInteger('price');

            // Duración en minutos.
            $table->unsignedInteger('duration');

            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Elimina la tabla "services".
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
