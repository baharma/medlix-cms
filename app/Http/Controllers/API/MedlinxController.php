<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AppHero;
use App\Models\Team;

class MedlinxController extends Controller
{
    public function index(){
        $hero = [];
        $heros = AppHero::where('app_id',1)->get();
        foreach ($heros as $val) {
            $extend   = json_decode($val->extend,true);
            $hero[] = [
                'image' => $val->image,
                'title' => $val->title,
                'button' => $extend['btn_action']
            ];
        }
        $data['hero'] = $hero;

        $teamUp     = Team::where(['up_lv'=>1,'app_id'=>0])->get();
        $team       = [];
        foreach ($teamUp as $value) {
            $team[] = [
                'image' => asset($value->image),
                'name'  => $value->name,
                'title' => $value->title
            ];
        }
        $data['team'] = $team;
        $data['visiMisi'] = null;
        $data['product'] = null;
        $data['solution'] = null;
        $data['why']    = null;
        $data['porto']  = null;
        $data['award']  = null;
        $data['testi']  = null;
        $data['mitra']  = null;
        $data['app']  = null;

        return response()->json([
            'status' => 200,
            'message'   => 'Medlinx Landing API',
            'data'      => $data
        ]);
    }
}
