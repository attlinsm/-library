<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        RoleUser::factory(1)->create();

        Role::factory(1)->create([
            'name' => 'reader',
        ]);

        BookCategory::factory(4)->create();
        Book::factory(200)->create();
    }
}
