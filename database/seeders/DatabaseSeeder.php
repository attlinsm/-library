<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::factory()->create([
            'name' => 'employee',
        ]);

        Role::factory()->create([
            'name' => 'reader',
        ]);

        User::factory()->admin()->create();
        User::factory()->reader()->create();

        BookCategory::factory(4)->create();
        Book::factory(200)->create();
    }
}
