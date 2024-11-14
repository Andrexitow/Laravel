<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Primero aseguramos que los roles estén en la base de datos
        $studentRole = Role::firstOrCreate(['name' => 'student']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Crear usuarios y asignarles roles
        $student = User::create([
            'name' => 'Estudiante',
            'email' => 'example@gmail.com',
            'password' => bcrypt('andresito'),
            'email_verified_at' => null, // O la fecha correspondiente
        ]);

        $student->roles()->attach($studentRole); // Asignar rol 'student'

        $teacher = User::create([
            'name' => 'Docente',
            'email' => 'docente@gmail.com',
            'password' => bcrypt('andresito'),
            'email_verified_at' => null,
        ]);

        $teacher->roles()->attach($teacherRole); // Asignar rol 'teacher'

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('andresito'),
            'email_verified_at' => null,
        ]);

        $admin->roles()->attach($adminRole); // Asignar rol 'admin'
    }
}
