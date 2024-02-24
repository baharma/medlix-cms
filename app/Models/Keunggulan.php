<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keunggulan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function KeunggulanList(){
        return $this->hasMany(KeunggulanList::class,'keunggulan_id','id');
    }
}
