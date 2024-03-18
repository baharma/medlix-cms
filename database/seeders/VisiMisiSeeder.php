<?php

namespace Database\Seeders;

use App\Models\VisiMisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJson = public_path('JsonSeeder/visi_misis_202403180341.json');
        $dataget = file_get_contents($dataJson);
        $data = json_decode($dataget, true);

        foreach ($data['visi_misis'] as $aboutData) {
            VisiMisi::create([
                'id' => $aboutData['id'],
                'app_id' => $aboutData['app_id'],
                'visi' => $aboutData['visi'],
                'misi' => $aboutData['misi'],
                'visi_img' => $aboutData['visi_img'],
                'misi_img' => $aboutData['misi_img'],
                'detail_img' => $aboutData['detail_img'],
            ]);
        }
    }
}
