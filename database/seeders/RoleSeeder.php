<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Define data
        $roles = [
            ['role'=>'user'],
            ['role'=>'admin'],
        ];
        //Insert data in the table
        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'role' => $role['role'],
            ]);
        }
    }
}
