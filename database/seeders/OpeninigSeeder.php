<?php

namespace Database\Seeders;

use App\Models\opening;
use Illuminate\Database\Seeder;

class OpeninigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        opening::create([
            'from_day' => 'السبت',
            'to_day' => 'الخميس',
            'from_time' => '8:00',
            'to_time' => '10:00',
        ]);
    }
}
