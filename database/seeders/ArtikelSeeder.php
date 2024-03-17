<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJson = public_path('JsonSeeder\articles_202403180339.json');
        $dataget = file_get_contents($dataJson);
        $data = json_decode($dataget, true);

        foreach ($data['articles'] as $aboutData) {
            Article::create([
                'id' => $aboutData['id'],
                'app_id' => $aboutData['app_id'],
                'slug' => $aboutData['slug'],
                'title' => $aboutData['title'],
                'thumbnail' => $aboutData['thumbnail'],
                'description' => $aboutData['description'],
                'check' => $aboutData['check'],
            ]);
        }
    }
}
