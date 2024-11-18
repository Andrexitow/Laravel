<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'title' => 'Curso de Programación Básica',
                'description' => 'Introducción a la programación con ejemplos prácticos.',
                'image_url' => 'course_img/1731963240_programacion.png',
                'start_date' => Carbon::parse('2024-01-10'),
                'end_date' => Carbon::parse('2024-04-10'),
                'is_active' => true,
            ],
            [
                'title' => 'Curso de Inteligencia Artificial',
                'description' => 'Explora los fundamentos de IA y aprendizaje automático.',
                'image_url' => 'course_img/1731963231_inteligencia.jpg',
                'start_date' => Carbon::parse('2024-02-01'),
                'end_date' => Carbon::parse('2024-05-01'),
                'is_active' => true,
            ],
            [
                'title' => 'Curso de Desarrollo Web',
                'description' => 'Aprende a construir aplicaciones web con HTML, CSS y JavaScript.',
                'image_url' => 'course_img/1731963223_DesarrolloWeb.jpg',
                'start_date' => Carbon::parse('2024-03-01'),
                'end_date' => Carbon::parse('2024-06-01'),
                'is_active' => true,
            ],
        ];

        foreach ($courses as $courseData) {
            $course = Course::firstOrCreate(
                ['title' => $courseData['title']],
                array_merge($courseData, ['created_at' => now(), 'updated_at' => now()])
            );

            $students = User::whereHas('roles', function ($query) {
                $query->where('name', 'student');
            })->get();

            $course->users()->sync($students->random(2)->pluck('id'));
        }
    }
}
