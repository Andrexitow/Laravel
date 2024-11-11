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
        $user = new User();

        $user->name = 'Andres Vargas';
        $user->email = 'example@gmail.com';
        $user->password = bcrypt('andresito');

        $user->save();

        User::factory(5)->create();
    }
}
