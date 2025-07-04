<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ["IT News", "Sports", "Food & Drinks", "Travel", "Lifestyle"];
        foreach ($categories as $category) {
            Category::factory()->create([
                "title" => $category,
                "slug" => Str::slug($category),
                "user_id" => User::inRandomOrder()->first()->id
            ]);
        };
    }
}
