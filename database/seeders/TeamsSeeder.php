<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJson = public_path('JsonSeeder/teams_202403180340.json');
        $dataget = file_get_contents($dataJson);
        $data = json_decode($dataget, true);

        $data = [
            [
                'app_id' => '1',
                'image'  => 'assets/images/teams/fauzi-sungkar.png',
                'name'   => 'Fauzi Sungkar',
                'title'  => 'Direktur',
                'up_lv'  => '1',
                'extend' => '{"twitter":"https://twitter.com/","linkedin":"https://www.linkedin.com","instagram":"https://www.instagram.com/"}',
            ],
            [
                'app_id' => '1',
                'image'  => 'assets/images/teams/alan-maulana.png',
                'name'   => 'Alan Maulana',
                'title'  => 'COO',
                'up_lv'  => '1',
                'extend' => '{"twitter":"https://twitter.com/","linkedin":"https://www.linkedin.com","instagram":"https://www.instagram.com/"}',
            ],
            [
                'app_id' => '1',
                'image'  => 'assets/images/teams//marisa-sibarani.png',
                'name'   => 'Marisa Sibarani',
                'title'  => 'GM Business dan Partnership',
                'up_lv'  => '1',
                'extend' => '{"twitter":"https://twitter.com/","linkedin":"https://www.linkedin.com","instagram":"https://www.instagram.com/"}',
            ],
            [
                'app_id' => '3',
                'image'  => 'assets/images/teams/fauzi-sungkar.png',
                'name'   => 'Fauzi Sungkar',
                'title'  => 'Direktur',
                'up_lv'  => '1',
                'extend' => '{"twitter":"https://twitter.com/","linkedin":"https://www.linkedin.com","instagram":"https://www.instagram.com/"}',
            ],
            [
                'app_id' => '3',
                'image'  => 'assets/images/teams/alan-maulana.png',
                'name'   => 'Alan Maulana',
                'title'  => 'COO',
                'up_lv'  => '1',
                'extend' => '{"twitter":"https://twitter.com/","linkedin":"https://www.linkedin.com","instagram":"https://www.instagram.com/"}',
            ],
            [
                'app_id' => '3',
                'image'  => 'assets/images/teams/marisa-sibarani.png',
                'name'   => 'Marisa Sibarani',
                'title'  => 'GM Business dan Partnership',
                'up_lv'  => '1',
                'extend' => '{"twitter":"https://twitter.com/","linkedin":"https://www.linkedin.com","instagram":"https://www.instagram.com/"}',
            ],
            [
                'app_id' => '3',
                'image'  => 'assets/images/teams/setyo-harsoyo.png',
                'name'   => 'Setyo Harsoyo',
                'title'  => 'Business Advisor',
                'up_lv'  => '1',
                'extend' => '{"twitter":"https://twitter.com/","linkedin":"https://www.linkedin.com","instagram":"https://www.instagram.com/"}',
            ],
            [
                'app_id' => '3',
                'image'  => 'assets/images/teams//business-sales-and-partnership.png',
                'name'   => 'Business, Sales and Partnership',
                'title'  => null,
                'up_lv'  => 0,
                'extend' => null,
            ],
            [
                'app_id' => '3',
                'image'  => 'assets/images/teams//finance-and-ga.png',
                'name'   => 'Finance and GA',
                'title'  => null,
                'up_lv'  => 0,
                'extend' => null,
            ],
            [
                'app_id' => '3',
                'image'  => 'assets/images/teams//it-dev-and-infra.png',
                'name'   => 'IT Dev and Infra',
                'title'  => null,
                'up_lv'  => 0,
                'extend' => null,
            ],
            [
                'app_id' => '3',
                'image'  => 'assets/images/teams//operational-and-customer-care.png',
                'name'   => 'Operational and Customer Care',
                'title'  => null,
                'up_lv'  => 0,
                'extend' => null,
            ],
            [
                'app_id' => '3',
                'image'  => 'assets/images/teams//pm-and-qa.png',
                'name'   => 'PM and QA',
                'title'  => null,
                'up_lv'  => 0,
                'extend' => null,
            ],
            [
                'app_id' => '3',
                'image'  => 'assets/images/teams//product-management.png',
                'name'   => 'Product Management',
                'title'  => null,
                'up_lv'  => 0,
                'extend' => null,
            ],


        ];


        foreach ($data as $team) {
            Team::create($team);
        }
    }
}
