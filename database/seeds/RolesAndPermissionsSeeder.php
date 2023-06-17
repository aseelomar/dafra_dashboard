<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'dashboard', 'description_ar' => 'اللوحة الرئيسية', 'description_en' => 'dashboard', 'guard_name' => 'admin']);
        Permission::create(['name' => 'news', 'description_ar' => 'الأخبار', 'description_en' => 'news', 'guard_name' => 'admin']);
        Permission::create(['name' => 'users', 'description_ar' => 'المستخدمين', 'description_en' => 'users', 'guard_name' => 'admin']);
        Permission::create(['name' => 'video_details', 'description_ar' => 'تفاصيل الفيديو', 'description_en' => 'video details', 'guard_name' => 'admin']);
        Permission::create(['name' => 'videos', 'description_ar' => 'الفيديوهات', 'description_en' => 'videos', 'guard_name' => 'admin']);
        Permission::create(['name' => 'categories', 'description_ar' => 'التصنيفات', 'description_en' => 'categories', 'guard_name' => 'admin']);
        Permission::create(['name' => 'general_logo', 'description_ar' => 'شعار العام ', 'description_en' => 'general_logo', 'guard_name' => 'admin']);
        Permission::create(['name' => 'guide', 'description_ar' => 'جدول البرامج ', 'description_en' => 'guide', 'guard_name' => 'admin']);
        Permission::create(['name' => 'goals', 'description_ar' => 'اللوحة الرئيسية', 'description_en' => 'goals', 'guard_name' => 'admin']);
        Permission::create(['name' => 'settings', 'description_ar' => 'اعدادات الموقع', 'description_en' => 'settings', 'guard_name' => 'admin']);
        Permission::create(['name' => 'backend_settings', 'description_ar' => 'الاعدادات الادارية ', 'description_en' => 'backend_settings', 'guard_name' => 'admin']);


        Role::create(['name' => 'super_admin', 'guard_name' => 'admin', 'description_ar' => 'مدير عام',
            'description_en' => 'Super Admin',])->givePermissionTo(Permission::all());

        Role::create(['name' => 'admin', 'guard_name' => 'admin', 'description_ar' => 'مدير',
            'description_en' => 'Admin',])->givePermissionTo(['dashboard', 'news', 'users', 'video_details', 'videos', 'categories', 'general_logo', 'goals', 'guide', 'settings']);

        Role::create(['name' => 'editor', 'guard_name' => 'admin', 'description_ar' => 'محرر',
            'description_en' => 'Editor',])->givePermissionTo(['news', 'videos', 'video_details', 'dashboard']);




    }
}
