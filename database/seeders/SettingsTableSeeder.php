<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imageUrl = 'assets/images/infyom.png';

        Setting::create(['key' => 'app_name', 'value' => 'Z-One']);
        Setting::create(['key' => 'app_logo', 'value' => $imageUrl]);
        Setting::create(['key' => 'company_name', 'value' => 'Z-One']);
        Setting::create(['key' => 'company_email', 'value' => 'test@gmail.com']);
        Setting::create(['key' => 'company_logo', 'value' => $imageUrl]);
        Setting::create(['key' => 'date_format', 'value' => 'Y-m-d']);
        Setting::create(['key' => 'time_format', 'value' => '0']);
        Setting::create(['key' => 'time_zone', 'value' => 'Asia/Kolkata']);
        Setting::create(['key' => 'current_currency', 'value' => '3']);
        Setting::create(['key' => 'decimal_separator', 'value' => '.']);
        Setting::create(['key' => 'thousand_separator', 'value' => ',']);
    }
}
