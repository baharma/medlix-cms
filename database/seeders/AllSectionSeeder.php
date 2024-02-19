<?php

namespace Database\Seeders;

use App\Models\AllSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'  => 'CMS',
                'url'   => '/cms',
                'icon'  => 'bx bx-book-reader'
            ],
            [
                'name'  => 'About',
                'url'   => '/about',
                'icon'  => 'bx bx-credit-card-front'
            ],
            [
                'name'  => 'Pricing',
                'url'   => '/pricing',
                'icon'  => 'bx bx-credit-card'
            ],
            [
                'name'  => 'Visi-Misi',
                'url'   => '/visi-misi',
                'icon'  => 'bx bx-message-square-detail'
            ],
            [
                'name'  => 'News',
                'url'   => '/news',
                'icon'  => 'bx bx-news'
            ],
            [
                'name'  => 'Event',
                'url'   => '/event',
                'icon'  => 'bx bx-chalkboard'
            ],
            [
                'name'  => 'Contact',
                'url'   => '/contact',
                'icon'  => 'bx bx-directions'
            ],
            [
                'name'  => 'Soluton',
                'url'   => '/solution',
                'icon'  => 'bx bx-at'
            ],
            [
                'name'  => 'APP Section',
                'url'   => '/app-section',
                'icon'  => 'bx bx-right-indent'
            ],
            [
                'name' => 'Select CMS',
                'url'  => '/select-cms',
                'icon'  => 'bx bx-layer'
            ],
            [
                'name' => 'Hero Medlinx',
                'url'  => '/medlinx-hero',
                'icon'  => 'bx bx-credit-card-front'
            ],
            [
                'name' => 'Hero Izidok',
                'url'  => '/izidok-hero',
                'icon'  => 'bx bx-credit-card-front'
            ],
            [
                'name' => 'Hero Iziklaim',
                'url'  => '/iziklaim-hero',
                'icon'  => 'bx bx-credit-card-front'
            ],

        ];

        for ($i=0; $i < count($data); $i++) {
            AllSection::create([
                'name' => $data[$i]['name'],
                'url' => $data[$i]['url'],
                'icon' => $data[$i]['icon'],
            ]);
        }
    }
}
