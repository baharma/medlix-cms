<?php

namespace Database\Seeders;

use App\Models\Keunggulan;
use App\Models\KeunggulanList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeunggulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJson = public_path('JsonSeeder/keunggulans_202403180339.json');
        $dataget = file_get_contents($dataJson);
        $data = json_decode($dataget, true);

        $dataJsonList = public_path('JsonSeeder/keunggulan_lists_202403180339.json');
        $datagetList = file_get_contents($dataJsonList);
        $dataList = json_decode($datagetList, true);

        foreach ($data['keunggulans'] as $aboutData) {
           Keunggulan::create([
                'id' => $aboutData['id'],
                'app_id' => $aboutData['app_id'],
                'title' => $aboutData['title'],
                'description' => $aboutData['description'],
                'image_title' => $aboutData['image_title'],
                'image' => $aboutData['image'],
            ]);
            foreach($dataList['keunggulan_lists'] as $list){
                if($list['keunggulan_id'] == $aboutData['id'] ){
                    KeunggulanList::create([
                        'id' => $list['id'],
                        'keunggulan_id' => $list['keunggulan_id'],
                        'title' => $list['title'],
                        'image' => $list['image'],
                    ]);
                }
            }
        }
    }
}
