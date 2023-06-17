<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([

            [
                'title' => 'الخبر الأول',
                'slug' => str_slug('الخبر الأول', '-', config('locale')),
                'description' => 'وصف الخبر الأول',
                'user_id' => 1,
                'category_id' => 1,
                'image' => '1568796025.jpg',
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'الخبر التاني',
                'slug' => str_slug('الخبر الثاني', '-', config('locale')),
                'description' => 'وصف الخبر التاني',
                'user_id' => 1,
                'category_id' => 1,
                'image' => '1568796025.jpg',
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'الخبر التالت',
                'slug' => str_slug('الخبر الثالث', '-', config('locale')),
                'description' => 'وصف الخبر التالت',
                'user_id' => 1,
                'category_id' => 1,
                'image' => '1568796025.jpg',
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'الخبر الرابع',
                'slug' => str_slug('الخبر الرابع', '-', config('locale')),
                'description' => 'وصف الخبر الرابع',
                'user_id' => 1,
                'category_id' => 1,
                'image' => '1568796025.jpg',
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'الخبر الخامس',
                'slug' => str_slug('الخبر الخامس', '-', config('locale')),
                'description' => 'وصف الخبر الخامس',
                'user_id' => 1,
                'category_id' => 1,
                'image' => '1568796025.jpg',
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

        ]);

        DB::table('goals')->insert([

            [
                'name' => 'الهدف الاول',
                'description' => 'وصف الهدف الاول',
                'user_id' => 1,
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'الهدف الثاني',
                'description' => 'وصف الهدف الثاني',
                'user_id' => 1,
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'الهدف الثالت',
                'description' => 'وصف الهدف الثالث',
                'user_id' => 1,
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'الهدف الرابع',
                'description' => 'وصف الهدف الرابع',
                'user_id' => 1,
                'active' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]

        ]);

        DB::table('guides')->insert([
            [
                'day_en' => 'saturday',
                'day_ar' => 'السبت',
                'properties' => json_encode([]),
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'day_en' => 'sunday',
                'day_ar' => 'الأحد',
                'properties' => json_encode([]),
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'day_en' => 'monday',
                'day_ar' => 'الأثنين',
                'properties' => json_encode([]),
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'day_en' => 'tuesday',
                'day_ar' => 'الثلاثاء',
                'properties' => json_encode([]),
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'day_en' => 'wednesday',
                'day_ar' => 'الأربعاء',
                'properties' => json_encode([]),
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'day_en' => 'thursday',
                'day_ar' => 'الخميس',
                'properties' => json_encode([]),
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'day_en' => 'friday',
                'day_ar' => 'الجمعة',
                'properties' => json_encode([]),
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);


    }
}
