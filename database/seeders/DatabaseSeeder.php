<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Chen Myae',
            'email' => 'chen@gmail.com',
            'password' => Hash::make('asdffdsa'),
        ]);



        $categories = ["IT News", "Sports", "Food & Drinks", "Travel", "Lifestyle"];
        foreach ($categories as $category) {
            Category::create([
                "title" => $category,
                "slug" => Str::slug($category),
                "user_id" => User::inRandomOrder()->first()->id
            ]);
        };

        Post::factory(250)->create();
    }
}
