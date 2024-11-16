<?php

namespace Database\Seeders;

use App\Models\Publication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $publications = [
            [
                'course_id' => 1,
                'user_id' => 1,  // Profesor del curso
                'title' => 'Tarea de Desarrollo Web: Crear una Página Personalizada',
                'content' => '
                    **Descripción de la tarea:**
        
                    ¡Hola estudiantes!
        
                    Para esta tarea, deberán crear una página web sencilla utilizando **HTML**, **CSS** y **JavaScript**. La página debe ser funcional y personalizada, y debe cumplir con los siguientes requisitos:
        
                    **Requisitos:**
                    1. **HTML**:
                        - La página debe tener una estructura básica con un encabezado, cuerpo y pie de página.
                        - Debe incluir al menos tres secciones (por ejemplo, "Inicio", "Acerca de", "Contacto").
                        - Usar etiquetas semánticas apropiadas (`<header>`, `<footer>`, `<article>`, `<section>`, etc.).
        
                    2. **CSS**:
                        - Utilizar un diseño responsivo que se adapte a diferentes tamaños de pantalla (usando `@media queries`).
                        - Personalizar los estilos con colores y fuentes de su elección.
                        - Deben aplicar al menos tres efectos visuales (transiciones, animaciones o efectos con `hover`).
        
                    3. **JavaScript**:
                        - Implementar una funcionalidad dinámica, como un formulario que se valida antes de enviarlo o un contador de visitas.
                        - El código debe estar bien organizado en un archivo separado.
        
                    **Fecha de entrega:** 1 de diciembre de 2024. 
        
                    ¡Espero ver sus proyectos creativos! Si tienen alguna duda, no duden en contactarme.
                ',
                'deadline' => Carbon::parse('2024-12-01'),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'user_id' => 2,  // Profesor del curso
                'title' => 'Desarrollo Web - Tarea 2',
                'content' => 'Contenido de la publicación 2...',
                'deadline' => Carbon::parse('2024-12-05'),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'user_id' => 3,  // Profesor del curso
                'title' => 'Publicación 3v1',
                'content' => 'Contenido de la publicación 3...v1',
                'deadline' => Carbon::parse('2024-12-10'),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'user_id' => 3,  // Profesor del curso
                'title' => 'Publicación 3v2',
                'content' => 'Contenido de la publicación 3...v2',
                'deadline' => Carbon::parse('2024-12-10'),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'user_id' => 3,  // Profesor del curso
                'title' => 'Publicación 3v3',
                'content' => 'Contenido de la publicación 3...v3',
                'deadline' => Carbon::parse('2024-12-10'),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];


        // Insertar publicaciones
        foreach ($publications as $publicationData) {
            Publication::firstOrCreate(
                ['title' => $publicationData['title']],
                $publicationData
            );
        }
    }
}
