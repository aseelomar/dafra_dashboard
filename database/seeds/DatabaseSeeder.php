<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SettingsSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(HomeSeeder::class);

    }
}
