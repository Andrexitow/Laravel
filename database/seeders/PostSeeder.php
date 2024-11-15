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
                'user_id' => 1,
                'title' => 'Publicación 1',
                'content' => 'Contenido de la publicación 1...',
                'deadline' => Carbon::parse('2024-12-01'),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 2,
                'user_id' => 2,
                'title' => 'Publicación 2',
                'content' => 'Contenido de la publicación 2...',
                'deadline' => Carbon::parse('2024-12-05'),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'user_id' => 3,
                'title' => 'Publicación 3v1',
                'content' => 'Contenido de la publicación 3...v1',
                'deadline' => Carbon::parse('2024-12-10'),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'user_id' => 3,
                'title' => 'Publicación 3v2',
                'content' => 'Contenido de la publicación 3...v2',
                'deadline' => Carbon::parse('2024-12-10'),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'course_id' => 3,
                'user_id' => 3,
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
