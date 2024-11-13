<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Estudiante',
            'email' => 'example@gmail.com',
            'password' => bcrypt('andresito'),
            'role' => 'student',
        ]);

        $user = User::create([
            'name' => 'Docente',
            'email' => 'Docente@gmail.com',
            'password' => bcrypt('andresito'),
            'role' => 'teacher',
        ]);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'Admin@gmail.com',
            'password' => bcrypt('andresito'),
            'role' => 'admin',
        ]);
        
        // User::factory(5)->create();
    }
}
