<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'key' => 'FOOTER_DESCRIPTION',
                'value' => 'هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.'
            ],
            [
                'key' => 'FOOTER_APPS',
                'value' => 'استمتع بأجمل الفيديوهات والمسلسلات وقم بتحميل تطبيق الظفرة
'
            ],
            [
                'key' => 'GOOGLE_PLAY',
                'value' => 'https://www.google.com'
            ],
            [
                'key' => 'APPLE_STORE',
                'value' => 'https://www.facebook.com'
            ],
            [
                'key' => 'FREQUENCY',
                'value' => 'النايل سات - 12322 عمودي -ترميز 27500'
            ],
            [
                'key' => 'SUPPORT_NUMBER',
                'value' => '.2025-5501(+1),202-555-0176(+1)'
            ],
            [
                'key' => 'SUPPORT_EMAIL',
                'value' => 'aldafrah@info.com'
            ],
            [
                'key' => 'ADDRESS',
                'value' => 'أبو ظبي - آل نهيان -بناية الفارعة'
            ],
            [
                'key' => 'FACEBOOK_ACCOUNT',
                'value' => 'dafra'
            ],
            [
                'key' => 'TWITTER_ACCOUNT',
                'value' => 'dafra'
            ],
            [
                'key' => 'INSTAGRAM_ACCOUNT',
                'value' => 'dafra'
            ],
            [
                'key' => 'RIGHT_RESERVED',
                'value' => '@ جميع الحقوق محفوظة لقناة الظفرة 2019-2020'
            ],

        ]);
    }
}
