<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\PlanDetail;
use App\Models\PlanFeatue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = PlanFeatue::all();
        $plans = Plan::all();

        foreach ($plans as $p) {
            foreach ($features as $key => $value) {
                PlanDetail::create([
                    'plan_id' =>$p->id,
                    'feature_id'=>$value->id,
                    'check'=>true
                ]);
            }
        }
    }
}
