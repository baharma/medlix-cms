<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AppHero;
use App\Models\Article;
use App\Models\CmsApp;
use App\Models\Event;
use App\Models\Keunggulan;
use App\Models\KeunggulanList;
use App\Models\MainAbout;
use App\Models\MainAppHero;
use App\Models\MainArticle;
use App\Models\MainCmsApp;
use App\Models\MainEvent;
use App\Models\MainKeunggulan;
use App\Models\MainPlan;
use App\Models\MainTestimoni;
use App\Models\Media;
use App\Models\Plan;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class IzidokController extends Controller
{
    public function index(){
        // Specify the file path
        $filePath = 'publishfile/izidok.json';

        // Read the contents of the JSON file using the Storage facade
        $jsonData = Storage::get($filePath);

        // Decode the JSON data into a PHP array
        $dataArray = json_decode($jsonData, true);

        return response()->json([
            'status' => 200,
            'message'   => 'Izidok Landing API',
            'data'      => $dataArray,
        ]);
    }
}
