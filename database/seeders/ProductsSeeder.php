<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJson = public_path('JsonSeeder/products_202403180340.json');
        $dataget = file_get_contents($dataJson);
        $data = json_decode($dataget, true);

        foreach ($data['products'] as $aboutData) {
            Product::create([
                'id' => $aboutData['id'],
                'app_id' => $aboutData['app_id'],
                'image' => $aboutData['image'],
                'logo' => $aboutData['logo'],
                'text' => $aboutData['text'],
                'url' => $aboutData['url'],
            ]);
        }
    }
}
