<?php

namespace Database\Seeders;

use App\Models\AppSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['app_id' => 1, 'section_id' => 1],
            ['app_id' => 1, 'section_id' => 5],
            ['app_id' => 1, 'section_id' => 6],
            ['app_id' => 1, 'section_id' => 8],
            ['app_id' => 1, 'section_id' => 11],
            ['app_id' => 1, 'section_id' => 14],
            ['app_id' => 1, 'section_id' => 16],
            ['app_id' => 1, 'section_id' => 18],
            ['app_id' => 1, 'section_id' => 22],
            ['app_id' => 1, 'section_id' => 23],
            ['app_id' => 2, 'section_id' => 1],
            ['app_id' => 2, 'section_id' => 2],
            ['app_id' => 2, 'section_id' => 3],
            ['app_id' => 2, 'section_id' => 7],
            ['app_id' => 2, 'section_id' => 8],
            ['app_id' => 2, 'section_id' => 9],
            ['app_id' => 2, 'section_id' => 17],
            ['app_id' => 2, 'section_id' => 19],
            ['app_id' => 2, 'section_id' => 21],
            ['app_id' => 3, 'section_id' => 1],
            ['app_id' => 3, 'section_id' => 4],
            ['app_id' => 3, 'section_id' => 8],
            ['app_id' => 3, 'section_id' => 10],
            ['app_id' => 3, 'section_id' => 12],
            ['app_id' => 3, 'section_id' => 13],
            ['app_id' => 3, 'section_id' => 15],
            ['app_id' => 3, 'section_id' => 20],
        ];

        foreach ($data as $record) {
            AppSection::create($record);
        }
    }
}
