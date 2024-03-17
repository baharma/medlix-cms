<?php

namespace Database\Seeders;

use App\Models\AppHero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class AppHeroesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJson = public_path('JsonSeeder\app_heroes_202403180338.json');
        $dataget = file_get_contents($dataJson);
        $data = json_decode($dataget, true);

        foreach ($data['app_heroes'] as $aboutData) {
            AppHero::create([
                'id' => $aboutData['id'],
                'app_id' => $aboutData['app_id'],
                'image' => $aboutData['image'],
                'title' => $aboutData['title'],
                'subtitle' => $aboutData['subtitle'],
                'extend' => $aboutData['extend'],
            ]);
        }
    }
}
