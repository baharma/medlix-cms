<?php

namespace Database\Seeders;

use App\Models\Solution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SolutionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJson = public_path('JsonSeeder\solutions_202403180340.json');
        $dataget = file_get_contents($dataJson);
        $data = json_decode($dataget, true);

        foreach ($data['solutions'] as $aboutData) {
            Solution::create([
                'id' => $aboutData['id'],
                'app_id' => $aboutData['app_id'],
                'title' => $aboutData['title'],
                'sub_title' => $aboutData['sub_title'],
                'extend' => $aboutData['extend'],
            ]);
        }
    }
}
