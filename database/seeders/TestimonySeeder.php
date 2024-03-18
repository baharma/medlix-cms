<?php

namespace Database\Seeders;

use App\Models\Testimoni;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJson = public_path('JsonSeeder\testimonis_202403180340.json');
        $dataget = file_get_contents($dataJson);
        $data = json_decode($dataget, true);

        foreach ($data['testimonis'] as $aboutData) {
            Testimoni::create([
                'id' => $aboutData['id'],
                'app_id' => $aboutData['app_id'],
                'testi' => $aboutData['testi'],
                'testi_by' => $aboutData['testi_by'],
                'testi_by_title' => $aboutData['testi_by_title'],
                'testi_by_img' => $aboutData['testi_by_img'],
            ]);
        }
    }
}
