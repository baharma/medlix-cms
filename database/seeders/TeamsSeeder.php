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
        $dataJson = public_path('JsonSeeder\teams_202403180340.json');
        $dataget = file_get_contents($dataJson);
        $data = json_decode($dataget, true);

        foreach ($data['teams'] as $aboutData) {
            Team::create([
                'id' => $aboutData['id'],
                'app_id' => $aboutData['app_id'],
                'image' => $aboutData['image'],
                'name' => $aboutData['name'],
                'title' => $aboutData['title'],
                'up_lv' => $aboutData['up_lv'],
            ]);
        }
    }
}
