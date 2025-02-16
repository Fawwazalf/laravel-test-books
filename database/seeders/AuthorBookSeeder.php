<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AuthorBookSeeder extends Seeder
{
    /**
     * Jalankan database seeder.
     */
    public function run(): void
    {
       
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

       
        Author::truncate();
        Book::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

     
        $authors = Author::factory(11)->create();

        Book::factory(20)->create([
            'published_at' => Carbon::now()->subYears(rand(1, 10))->format('Y-m-d'),
        ])->each(function ($book) use ($authors) {
            $book->update(['author_id' => $authors->random()->id]);
        });        
    }
}
