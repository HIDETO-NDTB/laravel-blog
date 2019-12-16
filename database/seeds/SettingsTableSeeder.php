<?php

use Illuminate\Database\Seeder;
use App\Settings;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create([
            'site_name' => 'Laravel Blog',
            'contact_number' => '91 9562 8974 63',
            'contact_email' => 'info@laravelblog.in',
            'address' => 'Bangalore, Indea'
        ]);
    }
}
