<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Post;
use App\Comment;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('categories')->insert([
//            'parent_id' => random_int(0, 2),
//            'name' => str_random(10),
//        ]);

        factory(Category::class, 5)->create()->each(function($category) {
            $category->posts()->save(factory(Post::class)->make());
        });
    }
}
