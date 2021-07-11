<?php

namespace Database\Seeders;

use App\Models\PermissionsName;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      PermissionsName::create([
            'name'=>'apppoinments_show',
            'guard_name'=>'web',
            'preview_name'=>'عرض المواعيد',
            'group_id'=>1,
            'group_name'=>'المواعيد'
        ]);
           PermissionsName::create([
            'name'=>'apppoinments_done',
            'guard_name'=>'web',
            'preview_name'=>'عرض المواعيد التامة',
            'group_id'=>1,
            'group_name'=>'المواعيد'
        ]);
        PermissionsName::create([
            'name'=>'user_show',
            'guard_name'=>'web',
            'preview_name'=>'عرض المستخدمين',
            'group_id'=>2,
            'group_name'=>'المستخدمين'
        ]);
        PermissionsName::create([
            'name'=>'user_add',
            'guard_name'=>'web',
            'preview_name'=>'اضافة المستخدمين',
            'group_id'=>2,
            'group_name'=>'المستخدمين'
        ]);
        PermissionsName::create([
            'name'=>'user_edit',
            'guard_name'=>'web',
            'preview_name'=>'تعديل المستخدمين',
            'group_id'=>2,
            'group_name'=>'المستخدمين'
        ]);
        PermissionsName::create([
            'name'=>'user_delete',
            'guard_name'=>'web',
            'preview_name'=>'حذف المستخدمين',
            'group_id'=>2,
            'group_name'=>'المستخدمين'
        ]);
        PermissionsName::create([
            'name'=>'services_show',
            'guard_name'=>'web',
            'preview_name'=>'عرض الخدمات',
            'group_id'=>3,
            'group_name'=>'الخدمات'
        ]);
        PermissionsName::create([
            'name'=>'services_edit',
            'guard_name'=>'web',
            'preview_name'=>'تعديل الخدمات',
            'group_id'=>3,
            'group_name'=>'الخدمات'
        ]);
        PermissionsName::create([
            'name'=>'services_delete',
            'guard_name'=>'web',
            'preview_name'=>'حذف الخدمات',
            'group_id'=>3,
            'group_name'=>'الخدمات'
        ]);
        PermissionsName::create([
            'name'=>'setting_show',
            'guard_name'=>'web',
            'preview_name'=>'عرض اعدادات الموقع',
            'group_id'=>4,
            'group_name'=>'اعدادات الموقع'
        ]);
        PermissionsName::create([
            'name'=>'setting_edit',
            'guard_name'=>'web',
            'preview_name'=>'تعديل اعدادات الموقع',
            'group_id'=>4,
            'group_name'=>'اعدادات الموقع'
        ]);
                PermissionsName::create([
            'name'=>'permission',
            'guard_name'=>'web',
            'preview_name'=>'إعطاء الصلاحيات',
            'group_id'=>5,
            'group_name'=>'اعطاء الصلاحيات'
        ]);

        PermissionsName::create([
            'name' => 'links_show',
            'guard_name' => 'web',
            'preview_name' => 'عرض الروابط',
            'group_id' => 6,
            'group_name' => 'الروابط'
        ]);


        PermissionsName::create([
            'name' => 'links_delete',
            'guard_name' => 'web',
            'preview_name' => 'حذف الرابط',
            'group_id' => 6,
            'group_name' => 'الروابط'
        ]);

        PermissionsName::create([
            'name' => 'links_add',
            'guard_name' => 'web',
            'preview_name' => 'اضافة الرابط',
            'group_id' => 6,
            'group_name' => 'الروابط'
        ]);

    }
}
