<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
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

        $student = User::create([
            'name' => 'Estudiante1',
            'email' => 'example1@gmail.com',
            'password' => bcrypt('andresito'),
            'email_verified_at' => null, 
        ]);
        $student->roles()->attach($studentRole);

        Profile::create([
            'user_id' => $student->id,
            'nombre' => 'Estudiante1',
            'apellido' => 'Apellido',
            'telefono' => '1234567890',
            'direccion' => 'Dirección del estudiante',
            'fecha_nacimiento' => '2000-01-01',
            'foto_perfil' => 'user_img/1731963034_user.png',
            'bio' => 'Biografía del estudiante',
        ]);

        $student = User::create([
            'name' => 'Estudiante2',
            'email' => 'example2@gmail.com',
            'password' => bcrypt('andresito'),
            'email_verified_at' => null, 
        ]);
        $student->roles()->attach($studentRole);

        Profile::create([
            'user_id' => $student->id,
            'nombre' => 'Estudiante2',
            'apellido' => 'Apellido',
            'telefono' => '1234567890',
            'direccion' => 'Dirección del estudiante',
            'fecha_nacimiento' => '2000-01-01',
            'bio' => 'Biografía del estudiante',
        ]);

        $student = User::create([
            'name' => 'Estudiante3',
            'email' => 'example3@gmail.com',
            'password' => bcrypt('andresito'),
            'email_verified_at' => null, 
        ]);
        $student->roles()->attach($studentRole);

        Profile::create([
            'user_id' => $student->id,
            'nombre' => 'Estudiante3',
            'apellido' => 'Apellido',
            'telefono' => '1234567890',
            'direccion' => 'Dirección del estudiante',
            'fecha_nacimiento' => '2000-01-01',
            'bio' => 'Biografía del estudiante',
        ]);

        $teacher = User::create([
            'name' => 'Docente',
            'email' => 'docente@gmail.com',
            'password' => bcrypt('andresito'),
            'email_verified_at' => null,
        ]);
        $teacher->roles()->attach($teacherRole); 

        Profile::create([
            'user_id' => $teacher->id,
            'nombre' => 'Docente',
            'apellido' => 'Apellido',
            'telefono' => '0987654321',
            'direccion' => 'Dirección del docente',
            'fecha_nacimiento' => '1985-01-01',
            'foto_perfil' => 'user_img/1731963034_user.png',
            'bio' => 'Biografía del docente',
        ]);

        $teacher = User::create([
            'name' => 'Docente2',
            'email' => 'docente2@gmail.com',
            'password' => bcrypt('andresito'),
            'email_verified_at' => null,
        ]);
        $teacher->roles()->attach($teacherRole); 

        Profile::create([
            'user_id' => $teacher->id,
            'nombre' => 'Docente2',
            'apellido' => 'Apellido',
            'telefono' => '0987654321',
            'direccion' => 'Dirección del docente',
            'fecha_nacimiento' => '1985-01-01',
            'bio' => 'Biografía del docente',
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('andresito'),
            'email_verified_at' => null,
        ]);
        $admin->roles()->attach($adminRole); 

        Profile::create([
            'user_id' => $admin->id,
            'nombre' => 'Admin',
            'apellido' => 'Admin',
            'telefono' => '1112223333',
            'direccion' => 'Dirección del admin',
            'fecha_nacimiento' => '1990-01-01',
            'bio' => 'Biografía del admin',
        ]);
    }
}
