<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course; 
use Carbon\Carbon; 

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Curso de Programación Básica',
                'description' => 'Introducción a la programación con ejemplos prácticos.',
                'start_date' => Carbon::parse('2024-01-10'),
                'end_date' => Carbon::parse('2024-04-10'),
                'is_active' => true,
            ],
            [
                'title' => 'Curso de Inteligencia Artificial',
                'description' => 'Explora los fundamentos de IA y aprendizaje automático.',
                'start_date' => Carbon::parse('2024-02-01'),
                'end_date' => Carbon::parse('2024-05-01'),
                'is_active' => true,
            ],
            [
                'title' => 'Curso de Desarrollo Web',
                'description' => 'Aprende a construir aplicaciones web con HTML, CSS y JavaScript.',
                'start_date' => Carbon::parse('2024-03-01'),
                'end_date' => Carbon::parse('2024-06-01'),
                'is_active' => false,
            ],
            // Agrega más cursos aquí si lo deseas
        ];

        foreach ($courses as $courseData) {
            Course::firstOrCreate(
                ['title' => $courseData['title']],
                array_merge($courseData, ['created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}

