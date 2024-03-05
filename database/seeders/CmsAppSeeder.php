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
            'logo'  => 'assets/images/logo/medlinx.png',
            'app_address'=> 'PT. Medlinx Asia Teknologi Jl. RS. Fatmawati No 7, 12140 Jakarta Selatan',
            'app_mail'  => 'sales@medlinx.co.id',
            'app_phone' => '021 723 7982',
            'app_wa'    => '021 723 7982',
            'app_gmaps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.026138083!2d106.79381367429939!3d-6.260287261289012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f19fc87b7f21%3A0xbc89ee2fd675bfd5!2sPT%20Medlinx%20Asia%20Teknologi!5e0!3m2!1sid!2sid!4v1688370161423!5m2!1sid!2sid'
      
        ]);
        CmsApp::create([
            'app_name'  => 'Izidok',
            'app_url'   => 'https://izidok.id/',
            'logo'      => 'assets/images/logo/izidok.png',
            'app_address'=> 'izidok <br> Jl. RS. Fatmawati No 7, 12140 Jakarta Selatan',
            'app_mail'  => 'dokterhebat@izidok.id',
            'app_phone' => '021 723 7982',
            'app_wa'    => '0822 1797 9782',
            'app_gmaps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.026138083!2d106.79381367429939!3d-6.260287261289012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f19fc87b7f21%3A0xbc89ee2fd675bfd5!2sPT%20Medlinx%20Asia%20Teknologi!5e0!3m2!1sid!2sid!4v1688370161423!5m2!1sid!2sid'
        ]);
        CmsApp::create([
            'app_name'  => 'Iziklaim',
            'app_url'   => 'https://iziklaim.co.id/',
            'logo'      => 'assets/images/logo/iziklaim.png',
            'app_address'=> 'PT. Medlinx Asia Teknologi Jl. RS. Fatmawati No 7, 12140 Jakarta Selatan',
            'app_mail'  => 'Sales@medlinx.co.id',
            'app_phone' => '+6221 8062 7982',
            'app_wa'    => '0815 8454 8909',
            'app_gmaps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.026138083!2d106.79381367429939!3d-6.260287261289012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f19fc87b7f21%3A0xbc89ee2fd675bfd5!2sPT%20Medlinx%20Asia%20Teknologi!5e0!3m2!1sid!2sid!4v1688370161423!5m2!1sid!2sid'

        ]);
    }
}
