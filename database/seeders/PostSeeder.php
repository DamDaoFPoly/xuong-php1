<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('authors')->insert([
                'name' => fake()->name(),
                'avatar' => fake()->imageUrl,
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            DB::table('categories')->insert([
                'name' => fake()->realText('50')
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            DB::table('tags')->insert([
                'name' => fake()->realText('15')
            ]);
        }

        for ($i = 0; $i < 1000; $i++) {
            DB::table('posts')->insert([
                'author_id' => rand(1, 5),
                'category_id' => rand(1, 10),
                'title' => fake()->text('100'),
                'excerpt' => fake()->text(),
                'img_thumbnail' => fake()->imageUrl,
                'img_cover' => fake()->imageUrl,
                'content' => fake()->text(),
                'is_trending' => rand(0, 1),
                'view_count' => rand(100, 1000),
                'status' => 'published',
            ]);
        }

        for ($i = 1; $i < 1001; $i++) {
            DB::table('post_tag')->insert([
                ['post_id' => $i, 'tag_id' => rand(1, 10)],
                ['post_id' => $i, 'tag_id' => rand(11, 20)]
            ]);
        }
    }
}
