<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'ROLE_ADMIN',
        ]);
        
        $role_employee = new Role();
        $role_employee->name = 'ROLE_USER';
        $role_employee->save();

    }
}
