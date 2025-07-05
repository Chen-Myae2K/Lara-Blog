<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            // NationSeeder::class,
            // UserSeeder::class,
            // CategorySeeder::class,
            PostSeeder::class,
        ]);

        // $photos = Storage::allFiles('public');
        // array_shift($photos);

        // Storage::delete($photos);
        // echo "\e[96mstorage cleaned";
    }
}
