<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\Category;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        Genre::factory()->count(30)->create()->each(function (Genre $genre) use ($categories) {
            $categoriesId = $categories->random(5)->pluck('id')->toArray();
            $genre->categories()->attach($categoriesId);
        });
    }
}
