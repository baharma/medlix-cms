<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AppHero;
use App\Models\Article;
use App\Models\CmsApp;
use App\Models\Event;
use App\Models\MainAppHero;
use App\Models\MainArticle;
use App\Models\MainCmsApp;
use App\Models\MainEvent;
use App\Models\MainMedia;
use App\Models\MainSolution;
use App\Models\Media;
use App\Models\Solution;
use App\Models\Team;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
