<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::create([
            'app_id' => 2,
            'name' => '300 Visit Pasien Masa Berlaku 12 Bulan',
            'amount'=> 549000,
        ]);
        Plan::create([
            'app_id' => 2,
            'name' => '500 Visit Pasien Masa Berlaku 24 Bulan',
            'amount'=> 749000,
            'best_seller' => true
        ]);
        Plan::create([
            'app_id' => 2,
            'name' => '1000 Visit Pasien Masa Berlaku 24 Bulan',
            'amount'=> 1299000,
        ]);
    }
}
