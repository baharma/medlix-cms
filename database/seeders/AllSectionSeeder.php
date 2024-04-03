<?php

namespace Database\Seeders;

use App\Models\AllSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllSectionSeeder extends Seeder
{
   
    public function run(): void
    {
        $data = [
            [
                'name'  => 'CMS',
                'url'   => '/admin/cms',
                'icon'  => 'bx bx-book-reader'
            ],
            [
                'name'  => 'About',
                'url'   => '/admin/izidok-about',
                'icon'  => 'bx bx-credit-card-front',
                'group' => 2,
            ],
            [
                'name'  => 'Pricing',
                'url'   => '/admin/izidok-pricing',
                'icon'  => 'bx bx-credit-card',
                'group' => 2,
            ],
            [
                'name'  => 'Visi-Misi',
                'url'   => '/admin/iziklaim-visi-misi',
                'icon'  => 'bx bx-message-square-detail',
                'group' => 3
            ],
            [
                'name'  => 'Visi-Misi',
                'url'   => '/admin/medlinx-visi-misi',
                'icon'  => 'bx bx-message-square-detail',
                'group' => 1
            ],
            [
                'name'  => 'Testimoni',
                'url'   => '/admin/medlinx-testimoni',
                'icon'  => 'bx bxs-like',
                'group' => 1
            ],
            [
                'name'  => 'Testimoni',
                'url'   => '/admin/izidok-testimoni',
                'icon'  => 'bx bxs-like',
                'group' => 2
            ],
            [
                'name'  => 'News',
                'url'   => '/admin/news',
                'icon'  => 'bx bx-news',
            ],
            [
                'name'  => 'Event',
                'url'   => '/admin/event',
                'icon'  => 'bx bx-chalkboard',
                'group' => 2
            ],
             [
                'name'  => 'Event',
                'url'   => '/admin/event',
                'icon'  => 'bx bx-chalkboard',
                'group' => 3
            ],
            [
                'name'  => 'Solution',
                'url'   => '/admin/medlinx-solution',
                'icon'  => 'bx bx-at',
                'group' => 1,
            ],
             [
                'name'  => 'Solution',
                'url'   => '/admin/iziklaim-solution',
                'icon'  => 'bx bx-at',
                'group' => 3,
            ],
            [
                'name'  => 'Provider',
                'url'   => '/admin/provider',
                'icon'  => 'bx bx-right-indent',
                'group' => 3,
            ],
            [
                'name'  => 'Teams',
                'url'   => '/admin/team/medlinx',
                'icon'  => 'bx bx-trophy',
                'group' => 1,
            ],
            [
                'name'  => 'Teams',
                'url'   => '/admin/teams',
                'icon'  => 'bx bx-trophy',
                'group' => 3,
            ],
            [
                'name'  => 'Portofolio',
                'url'   => '/admin/porto',
                'icon'  => 'bx bx-image',
                'group' => 1,
            ],
            [
                'name'  => 'IMG Slider',
                'url'   => '/admin/slider',
                'icon'  => 'bx bx-image',
                'group' => 2,
            ],
            [
                'name' => 'Page Hero',
                'url'  => '/admin/medlinx-hero',
                'icon' => 'bx bx-credit-card-front',
                'group'=> 1
            ],
            [
                'name' => 'Page Hero',
                'url'  => '/admin/izidok-hero',
                'icon' => 'bx bx-credit-card-front',
                'group'=> 2

            ],
            [
                'name' => 'Page Hero',
                'url'  => '/admin/iziklaim-hero',
                'icon' => 'bx bx-credit-card-front',
                'group'=> 3
            ],
            [
                'name' => 'Keunggulan',
                'url'  => '/admin/izidok-keunggulan',
                'icon' => 'bx bx-trending-up',
                'group'=> 2
            ],
            [
                'name' => 'Product',
                'url'  => '/admin/medlinx-produk',
                'icon' => 'bx bxs-briefcase-alt-2',
                'group'=> 1
            ],
            [
                'name' => 'Why Us',
                'url'  => '/admin/medlinx-why-us',
                'icon' => 'bx bxs-conversation',
                'group'=> 1
            ],
        ];

       foreach ($data as $item) {
          AllSection::create($item);
       }
    }
}
