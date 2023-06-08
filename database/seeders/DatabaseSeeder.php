<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->create([
            'role_name' => 'admin',
        ]);

        Role::factory()->create([
            'role_name' => 'user',
        ]);

         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@mail.com',
             'password' => Hash::make('admin'),
             'role_id' => 1,
         ]);

        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => Hash::make('user'),
            'role_id' => 2,
        ]);

         Category::factory(4)->create();

         Post::factory(100)->create();
    }
}
