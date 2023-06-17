<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            [
                'name' => 'Oder Derawi',
                'email' => 'odai.derawi@gmail.com',
                'password' => bcrypt('aA216213**'),
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Al-dafrah ',
                'email' => 'dafrah@gmail.com',
                'password' => bcrypt('123456'),
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],


        ]);

        DB::table('model_has_roles')->insert([
            [
                'role_id' => 1,
                'model_type' => 'App\User',
                'model_id' => 1
            ],

            [
                'role_id' => 2,
                'model_type' => 'App\User',
                'model_id' => 2
            ]

        ]);
    }
}
