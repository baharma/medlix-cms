<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Plan;
use App\Models\PlanDetail;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CmsAppSeeder::class,
            PlanFeatureSeeder::class,
            PlanSeeder::class,
            PlanDetailSeeder::class,
            AllSectionSeeder::class,
            AppSectionSeeder::class,
            UserSeeder::class,
            AboutsSeeder::class,
            AppHeroesSeeder::class,
            ArtikelSeeder::class,
            EventSeeder::class,
            KeunggulanSeeder::class,
            MediaSeeder::class,
            ProductsSeeder::class,
            SolutionsSeeder::class,
            TeamsSeeder::class,
            TestimonySeeder::class,
            VisiMisiSeeder::class
        ]);
    }
}
