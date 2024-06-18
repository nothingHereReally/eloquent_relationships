<?php

namespace Database\Seeders;

// use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        \App\Models\Author::factory(10)->create()->each(function ($author){
            \App\Models\Book::factory(3)->create(['author_id' => $author->id])
                                        ->each(function ($book){
                $genres = \App\Models\Genre::factory(2)->create();
                // $book->genres()->attach($genres);
                \App\Models\Review::factory(5)->create(['book_id' => $book->id]);
            });
        });
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
