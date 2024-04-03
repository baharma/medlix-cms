<?php

namespace App\Http\Controllers;

use App\Models\CmsApp;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    public function UploadImageCkEditor(Request $request){

        if ($request->hasFile('upload')) {
            $filename = saveImageLocal($request->file('upload'),'CkEditor');
            return response()->json(['fileName' => $filename, 'uploaded'=> 1, 'url' => asset($filename)]);
        }

    }

    public function newsOper($AppIdArray, $app)
    {
        $itemIds = explode(',', $AppIdArray);
        $apps = collect($itemIds)->map(function ($eventId) {
            return CmsApp::find($eventId);
        });

        $session = session('artikelNews');

        foreach ($apps as $index => $currentApp) {
            if ($session == null) {
                $session = session('artikelNews', [
                    $index => $currentApp->id
                ]);

                return redirect()->route('artikel.create', ['AppIdArray' => $AppIdArray, 'app' => $currentApp->id]);
            } else {
                if (count($currentApp) === count($session) && empty(array_diff($currentApp->toArray(), $session))) {
                    return redirect()->route('news');
                }

                $session = session('artikelNews', [
                    $index => $currentApp->id
                ]);

                return redirect()->route('artikel.create', ['AppIdArray' => $AppIdArray, 'app' => $currentApp->id]);
            }
        }
    }

    public function CheckeUnggulan(Request $request){

    }
}
