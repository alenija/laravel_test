<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use App\Comment;
use App\Category;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('posts')->insert([
//            'user_id' => random_int(1,100),
//            'category_id' => random_int(1,2),
//            'slug' => str_random(10),
//            'title' => str_random(10),
//            'text' => str_random(100),
//        ]);

//        $post = factory(App\Post::class, 3)->make();
//        $post = factory(App\Post::class, 3)->create();

        factory(Post::class, 5)->create()->each(function($post) {
            $post->comments()->save(factory(Comment::class)->make());
        });
    }
}
