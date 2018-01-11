<?php

use App\User;
use App\Post;
use App\Comment;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->delete();

//        DB::table('users')->insert([
//            'name' => str_random(10),
//            'email' => str_random(10).'@gmail.com',
//            'password' => bcrypt('secret'),
//        ]);


        factory(User::class, 50)->create()->each(function($user) {
//            $user->posts()->save(factory(Post::class)->make()); // create post from $user

            $role_user = Role::where('name', 'ROLE_USER')->first();
            $user->roles()->attach($role_user);
        });

//        $role_user = Role::where('name', 'user')->first();
//        $role_admin  = Role::where('name', 'admin')->first();
//
//        $employee = new User();
//        $employee->name = 'Employee Name';
//        $employee->email = 'employee@example.com';
//        $employee->password = bcrypt('secret');
//        $employee->save();
//        $employee->roles()->attach($role_user);
//
//        $manager = new User();
//        $manager->name = 'Manager Name';
//        $manager->email = 'manager@example.com';
//        $manager->password = bcrypt('secret');
//        $manager->save();
//        $manager->roles()->attach($role_admin);
    }
}
