<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Post::factory()
            ->count(200)
            ->create()
            ->each(function ($post) {
                $categories = Category::inRandomOrder()->take(rand(1, 5))->get();

                $post->categories()->sync($categories);

            });

    }
}
