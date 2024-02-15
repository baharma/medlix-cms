<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanFeatue extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function plan_detail(){
        return $this->hasMany(PlanDetail::class);
    }
    public function plan(){
        return $this->belongsToMany(Plan::class,'plan_details','feature_id','plan_id')->withPivot('id');
    }
}
