<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = Setting::create([
            'title' => 'Global',
            'sub_title' => 'جودة طبية فائقة بالإضافة الى عناية صحية وسرعة وثقة عالية',
            'twitter_url' => 'https://twitter.com',
            'instagram_url' => 'https://intagram.com',
            'facebook_url' => 'https://facebook.com',
            'contact_number' => '33 41 50 18-44 44 77 89',
            'emergency_contact_number' => '22 55 50 18-44 44 77 89',
        ]);
    }
}
