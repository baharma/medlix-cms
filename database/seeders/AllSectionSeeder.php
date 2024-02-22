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
                'url'   => '/izidok-pricing',
                'icon'  => 'bx bx-credit-card',
                'group' => 2,
            ],
            [
                'name'  => 'Visi-Misi',
                'url'   => '/visi-misi',
                'icon'  => 'bx bx-message-square-detail',
                'group' => 1,
            ],
            [
                'name'  => 'Visi-Misi',
                'url'   => '/medlinx-visi-misi',
                'icon'  => 'bx bx-message-square-detail',
                'group' => 1
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
                'name'  => 'Soluton',
                'url'   => '/medlinx-solution',
                'icon'  => 'bx bx-at',
                'group' => 1,
            ],
             [
                'name'  => 'Soluton',
                'url'   => '/iziklaim-solution',
                'icon'  => 'bx bx-at',
                'group' => 3,
            ],
            [
                'name'  => 'Provider',
                'url'   => '/provider',
                'icon'  => 'bx bx-right-indent',
                'group' => 3,
            ],
            [
                'name'  => 'Teams',
                'url'   => '/teams',
                'icon'  => 'bx bx-trophy',
                'group' => 1,
            ],
            [
                'name'  => 'Teams',
                'url'   => '/teams',
                'icon'  => 'bx bx-trophy',
                'group' => 3,
            ],
            [
                'name'  => 'Portofolio',
                'url'   => '/porto',
                'icon'  => 'bx bx-image',
                'group' => 1,
            ],
            [
                'name'  => 'IMG Slider',
                'url'   => '/slider',
                'icon'  => 'bx bx-image',
                'group' => 2,
            ],
            [
                'name' => 'Page Hero',
                'url'  => '/medlinx-hero',
                'icon' => 'bx bx-credit-card-front',
                'group'=> 1
            ],
            [
                'name' => 'Page Hero',
                'url'  => '/izidok-hero',
                'icon' => 'bx bx-credit-card-front',
                'group'=> 2

            ],
            [
                'name' => 'Page Hero',
                'url'  => '/iziklaim-hero',
                'icon' => 'bx bx-credit-card-front',
                'group'=> 3
            ],

        ];

       foreach ($data as $item) {
          AllSection::create($item);
       }
    }
}
