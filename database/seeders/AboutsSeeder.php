<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function PHPSTORM_META\map;

class AboutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJson = public_path('JsonSeeder\about.json');
        $dataget = file_get_contents($dataJson);
        $data = json_decode($dataget, true);

        foreach ($data['abouts'] as $aboutData) {
            About::create([
                'id' => $aboutData['id'],
                'app_id' => $aboutData['app_id'],
                'image' => $aboutData['image'],
                'title' => $aboutData['title'],
                'list' => $aboutData['list'],
            ]);
        }
    }
}
