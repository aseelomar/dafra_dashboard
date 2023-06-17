<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([

            [
                'name' => 'الأخبار',
                'slug' => str_slug('news', '-', config('locale')),
                'user_id' =>   1,
                'parent_id' => null,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'الفيديوهات',
                'slug' => str_slug('videos', '-', config('locale')),
                'user_id' =>   1,
                'parent_id' => null,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'مسلسلات',
                'slug' => str_slug('series', '-', config('locale')),
                'user_id' =>   1,
                'parent_id'=>2,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'البرامج',
                'slug' => str_slug('programs', '-', config('locale')),
                'user_id' =>   1,
                'parent_id'=>2,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'أفلام',
                'slug' => str_slug('movies', '-', config('locale')),
                'user_id' =>   1,
                'parent_id'=>2,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);
    }
}
