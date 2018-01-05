<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Post;
use App\Comment;
use App\Category;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('comments')->insert([
//            'user_id' => random_int(1,100),
//            'post_id' => random_int(1,100),
//            'text' => str_random(50),
//        ]);
    }
}
