<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsApp extends Model
{
    use HasFactory;
    protected $fillable = [
        'app_name',
        'app_url',
        'logo',
        'app_address',
        'app_mail',
        'app_phone',
        'app_wa',
        'app_gmaps'
    ];

    public function Event(){
        return $this->hasMany(Event::class,'app_id','id');
    }
}
