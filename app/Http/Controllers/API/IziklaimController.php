<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;


class IziklaimController extends Controller
{
    public function index(){
        $path = public_path('publishfile/iziklaim.json');
        $data = file_get_contents($path);

        $dataArray = json_decode($data, true);

        return response()->json([
            'status' => 200,
            'message'   => 'Iziklaim Landing API',
            'data'      => $dataArray
        ]);
    }
}
