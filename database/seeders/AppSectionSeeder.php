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
        AppSection::create(['app_id'=>2,'section_id'=>1]);
        AppSection::create(['app_id'=>2,'section_id'=>2]);
        AppSection::create(['app_id'=>2,'section_id'=>4]);
        AppSection::create(['app_id'=>2,'section_id'=>5]);
        AppSection::create(['app_id'=>2,'section_id'=>6]);
        AppSection::create(['app_id'=>2,'section_id'=>7]);
        AppSection::create(['app_id'=>2,'section_id'=>8]);
        AppSection::create(['app_id'=>2,'section_id'=>9]);
    }
}
