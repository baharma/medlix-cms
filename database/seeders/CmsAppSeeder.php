<?php

namespace Database\Seeders;

use App\Models\CmsApp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CmsAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CmsApp::create([
            'app_name' => 'Medlinx',
            'app_url' => 'https://medlinx.co.id/',
            'logo'  => 'assets/images/logo/medlinx.png'
        ]);
        CmsApp::create([
            'app_name' => 'Izidok',
            'app_url' => 'https://izidok.id/',
            'logo'  => 'assets/images/logo/izidok.png'

        ]);
        CmsApp::create([
            'app_name' => 'Iziklaim',
            'app_url' => 'https://iziklaim.co.id/',
            'logo'  => 'assets/images/logo/iziklaim.png'

        ]);
    }
}
