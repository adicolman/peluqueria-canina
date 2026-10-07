<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Carga los servicios iniciales de la peluquería.
     *
     * El precio se guarda en centavos (ej: 3000000 => $30.000,00).
     */
    public function run(): void
    {
        DB::table('services')->insert([
            [
                'name' => 'Baño completo',
                'description' => 'Baño con shampoo especial, enjuague y secado para tu mascota.',
                'price' => 3000000,
                'duration' => 45,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Corte de pelo',
                'description' => 'Corte de pelo con tijera o máquina, según la raza y tu preferencia.',
                'price' => 15000000,
                'duration' => 30,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Limpieza de oídos',
                'description' => 'Limpieza suave y segura de los oídos de tu mascota.',
                'price' => 800000,
                'duration' => 15,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Corte de uñas',
                'description' => 'Corte y limado de uñas con instrumental profesional.',
                'price' => 800000,
                'duration' => 15,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tratamiento estético',
                'description' => 'Tratamiento de estética completo: baño, corte, limpieza y perfumado.',
                'price' => 1500000,
                'duration' => 60,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
