<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPlanDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function plan(){
        return $this->belongsTo(Plan::class,'plan_id');
    }
    public function feature(){
        return $this->belongsTo(PlanFeatue::class,'feature_id');
    }
}
