<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataJson = public_path('JsonSeeder/events_202403180339.json');
        $dataget = file_get_contents($dataJson);
        $data = json_decode($dataget, true);

        foreach ($data['events'] as $aboutData) {
            Event::create([
                'id' => $aboutData['id'],
                'app_id' => $aboutData['app_id'],
                'name' => $aboutData['name'],
                'image' => $aboutData['image'],
                'details' => $aboutData['details'],
            ]);
        }
    }
}
