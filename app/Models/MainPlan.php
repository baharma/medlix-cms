<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainPlan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function details(){
        return $this->hasMany(PlanDetail::class);
    }
    public function feature(){
        return $this->belongsToMany(PlanFeatue::class,'plan_details','plan_id','feature_id')->withPivot('check', 'id');
    }
}
