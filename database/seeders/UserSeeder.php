<?php

namespace Database\Seeders;

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
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Chen Myae',
            'email' => 'chen@gmail.com',
            'role' => 'author',
            'password' => Hash::make('asdffdsa'),
        ]);

        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('asdffdsa'),
        ]);

        User::factory()->create([
            'name' => 'Test Editor',
            'email' => 'editor@gmail.com',
            'role' => 'editor',
            'password' => Hash::make('asdffdsa'),
        ]);
    }
}
