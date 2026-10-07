<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /** Carga entradas de ejemplo en el blog, una por categoría. */
    public function run(): void
    {
        DB::table('blog_entries')->insert([
            [
                'title' => 'Cómo bañar a tu perro en casa sin que sea un desastre',
                'excerpt' => 'Guía práctica para baño en casa: temperatura del agua, producto adecuado y cómo secarlo bien.',
                'content' => 'Bañar a tu perro en casa puede ser una tarea sencilla si seguís algunos pasos básicos. '
                    .'Primero, cepillá el pelaje antes de mojarlo para desenredar nudos y sacar el pelo suelto. '
                    .'La temperatura del agua debe ser tibia, nunca caliente ni fría. '
                    .'Usá un shampoo especial para perros: el pH de su piel es diferente al nuestro y el jabón humano puede resecarlo. '
                    .'Aplicá el shampoo desde el cuello hacia la cola, evitando ojos y orejas. '
                    .'Enjuagá bien: los restos de shampoo pueden causar picazón e irritaciones. '
                    .'Finalmente, secá con una toalla y, si tu perro lo tolera, con secador en frío. '
                    .'Con la práctica, el baño se vuelve un momento de relax para los dos.',
                'category' => 'higiene',
                'image' => 'blog-higiene.jpg',
                'published_at' => '2026-09-01',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '¿Cuántas veces debe comer un gato al día?',
                'excerpt' => 'Frecuencia de alimentación según la edad de tu gato y errores comunes a evitar.',
                'content' => 'La alimentación del gato varía según su etapa de vida. '
                    .'Los gatitos de 2 a 6 meses deben comer de 3 a 4 veces por día, porque necesitan mucha energía para crecer. '
                    .'De 6 meses a 1 año, dos comidas diarias son suficientes. '
                    .'Los gatos adultos se mantienen sanos con dos comidas al día, siempre a los mismos horarios. '
                    .'Los gatos mayores (más de 7 años) pueden necesitar porciones más pequeñas y frecuentes. '
                    .'Un error muy común es dejar la comida disponible todo el día: favorece la obesidad y hace que el gato pierda el hábito de masticar. '
                    .'Consultá siempre con tu veterinario para armar el plan alimentario ideal según la raza y el peso de tu mascota.',
                'category' => 'alimentacion',
                'image' => 'blog-alimentacion.jpg',
                'published_at' => '2026-09-10',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cuidados del pelo según la raza',
                'excerpt' => 'Cada raza tiene un pelaje distinto: frecuencia de cepillado, cortes y productos recomendados.',
                'content' => 'No todas las razas requieren los mismos cuidados del pelaje. '
                    .'Los perros de pelo largo, como el Collie o el Pastor Alemán, necesitan cepillado diario para evitar enredos y nudos. '
                    .'Los perros de pelo rizado, como el Poodle o el Bichón, requieren corte profesional cada 4 a 6 semanas para que el pelo no se enrede. '
                    .'Los perros de pelo corto, como el Beagle o el Boxer, se cepillan una o dos veces por semana. '
                    .'Razas con doble pelaje, como el Husky, mudan mucho: durante la muda conviene cepillar todos los días. '
                    .'En nuestra peluquería evaluamos el pelaje de tu mascota y te recomendamos la frecuencia ideal de cuidado.',
                'category' => 'cuidados-por-raza',
                'image' => null,
                'published_at' => '2026-09-20',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Señales de que tu mascota está estresada',
                'excerpt' => 'Aprendé a detectar el estrés en perros y gatos: comportamientos que no debés pasar por alto.',
                'content' => 'Las mascotas también sienten estrés y es importante saber detectarlo a tiempo. '
                    .'Entre las señales más comunes en perros están: jadeo excesivo sin actividad física, temblores, esconderse, '
                    .'destrucción de objetos y cambios en el apetito. '
                    .'En los gatos, el estrés se manifiesta con aseo excesivo o ausente, orinar fuera del lugar, '
                    .'agresividad repentina y rechazo a la comida. '
                    .'Las causas habituales son los cambios de rutina, ruidos fuertes, viajes y la llegada de un nuevo integrante a la familia. '
                    .'Si detectás estas señales, consultá con tu veterinario: en muchos casos, un ambiente enriquecido y rutinas estables resuelven el problema.',
                'category' => 'bienestar',
                'image' => 'blog-bienestar.jpg',
                'published_at' => '2026-10-01',
                'is_published' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
