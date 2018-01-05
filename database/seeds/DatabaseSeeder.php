<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call('UserTableSeeder');
//        $this->command->info('??????? ????????????? ????????? ???????!');

        Model::unguard();

        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
//        $this->call(CommentsTableSeeder::class);

        Model::reguard();

    }
}
