<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSection extends Model
{
    use HasFactory;
    public $guarded =  ['id'];
    public function section(){
        return $this->belongsTo(AllSection::class,'section_id');
    }
}
