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
            'address' => 'Gaza,Palestine',
            'title' => 'Global',
            'sub_title' => 'Dental-Global',
            'twitter_url' => 'https://twitter.com',
            'google_url' => 'https://google.com',
            'facebook_url' => 'https://facebook.com',
            'contact_number' => '33 41 50 18-44 44 77 89',
            'about-us' => 'Global Dental Clinc',
        ]);
    }
}
