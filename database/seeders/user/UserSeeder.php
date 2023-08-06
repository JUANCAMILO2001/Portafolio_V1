<?php

namespace Database\Seeders\user;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Juan Camilo',
            'lastname' => 'Rodriguez Ramirez',
            'email' => 'juan.camilorodrigez@gmail.com',
            'password' => Hash::make('admin'),
            'phone' => '+57 304 268 65 88',
            'address' => 'CLL 68 F Sur #49G - 98',
            'descriptionprofesional' => 'Software Developer',
        ]);
    }
}
