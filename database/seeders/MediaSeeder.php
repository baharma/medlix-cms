<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJson = public_path('JsonSeeder\media_202403180339.json');
        $dataget = file_get_contents($dataJson);
        $data = json_decode($dataget, true);

        foreach ($data['media'] as $aboutData) {
            Media::create([
                'id' => $aboutData['id'],
                'title' => $aboutData['title'],
                'text' => $aboutData['text'],
                'images' => $aboutData['images'],
                'url' => $aboutData['url'],
                'mark' => $aboutData['mark'],
            ]);
        }
    }
}
