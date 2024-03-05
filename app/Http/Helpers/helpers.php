<?php
use App\Models\About;
use App\Models\AppHero;
use App\Models\Article;
use App\Models\CmsApp;
use App\Models\Event;
use App\Models\Keunggulan;
use App\Models\Media;
use App\Models\Plan;
use App\Models\Product;
use App\Models\Solution;
use App\Models\Team;
use App\Models\Testimoni;
use App\Models\VisiMisi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;


function ActiveApp($get = 'null'){
    $user = Auth::user();
    $app = CmsApp::find($user->default_cms);
    $data['id'] = $app?->id??0;
    $data['name'] = strtoupper($app?->app_name)??'';
    $data['url'] = $app?->app_url??null;
    $data['logo'] = $app?->logo??null;
    // dd($app);

    return $data[$get];
}
function appLogo(){
    return "<img src=".asset(ActiveApp('logo'))." style='width: 110px' alt='logo icon'>";
}
function mataUang($num){
    return 'Rp'. number_format($num,0,',' ,'.');
}
function num($num){
    return number_format($num,0,',' ,'.');
}
function saveImageLocal(UploadedFile $file,$path){
    $filename = uniqid() . '_' . $file->getClientOriginalName();
    $file->storeAs($path, $filename, 'images_local');
    $FilePath = '/assets/images/'.$path.'/'.$filename;
    return $FilePath;
}
function saveImageLocalNew(UploadedFile $file, $path, $name = false) {
    if(!$name){
        $filename = $file->getClientOriginalName();
    }else{
        $extension = $file->getClientOriginalExtension(); // Get the original extension
        $filename = $name . '.' . $extension; // Combine name and extension
    }
    // Check if the file with the same name exists
    $existingFilePath = public_path('assets/images/' . $path . '/' . $filename);
    if (file_exists($existingFilePath)) {
        // Remove the existing file
        unlink($existingFilePath);
    }

    // Store the file with the generated filename
    $file->storeAs($path, $filename, 'images_local');

    // Construct the file path
    $FilePath = 'assets/images/' . $path . '/' . $filename;

    return $FilePath;
}
function isNull($data){
    return is_null($data)? true: false;
}
function decode($data){
    return json_decode($data,true);
}
function checkImage($filePath,$size = 200) {
    $placeholderURL = 'https://placehold.co/'.$size;
    // Check if the file exists
    if (file_exists($filePath)) {
        // If the file exists, return the file path
        return asset($filePath);
    } else {
        // If the file does not exist, return the placeholder URL
        return $placeholderURL;
    }
}
function process_html($html) {
    // Create a DOMDocument object
    $dom = new DOMDocument();

    // Load HTML content
    $dom->loadHTML($html);

    $result = [];

    // Extract text within <p> tags and add to result array
    $paragraphs = $dom->getElementsByTagName('p');
    foreach ($paragraphs as $paragraph) {
        $result[] = $paragraph->nodeValue;
    }

    // Extract list items within <ul> tags and add to result array
    $ul_tags = $dom->getElementsByTagName('ul');
    foreach ($ul_tags as $ul) {
        $list_items = [];
        $li_tags = $ul->getElementsByTagName('li');
        foreach ($li_tags as $li) {
            $list_items[] = $li->nodeValue;
        }
        $result[] = $list_items;
    }

    return $result;
}
function insertIcon($html) {
    $dom = new \DOMDocument();
    // Load HTML content
    $dom->loadHTML($html);

    // Add <i> tag with class to <li> tags
    $ul_tags = $dom->getElementsByTagName('ul');
    foreach ($ul_tags as $ul) {
        $li_tags = $ul->getElementsByTagName('li');
        foreach ($li_tags as $li) {
            $icon = $dom->createElement('i');
            $icon->setAttribute('class', 'bx bx-check-double');
            $li->insertBefore($icon, $li->firstChild);
        }
    }

    // Output the modified HTML without doctype, html, and body tags
    $output_html = '';
    foreach ($dom->getElementsByTagName('body')->item(0)->childNodes as $node) {
        $output_html .= $dom->saveHTML($node);
    }
    return $output_html;
}
function split_number($number) {
    $number_str = (string)$number;
    $length = strlen($number_str);

    if ($length <= 3) {
        return array($number_str, '.000');
    } elseif ($length <= 6) {
        return array(substr($number_str, 0, $length - 3), '.' . str_pad(substr($number_str, -3), 3, '0'));
    } else {
        $first_part = substr($number_str, 0, $length - 6);
        $second_part = substr($number_str, -6, 3);
        return array($first_part . '.' . $second_part, '.000');
    }
}

function insertLineBreaks($text, $maxLength = 15) {
    $words = explode(' ', $text);
    $result = '';
    $lineLength = 0;

    foreach ($words as $word) {
        $wordLength = strlen($word);
        $lineLength += $wordLength;

        if ($lineLength > $maxLength) {
            $result .= "<br>";
            $lineLength = $wordLength;
        }

        $result .= $word . ' ';
    }

    return rtrim($result);
}

function checkPreviewMedlinx()
{
    $hero = AppHero::where('app_id',1)->get();
    if ($hero->count() < 1) {
        return false;
    }

    $solution = Solution::where('app_id',1)->get();
    if ($solution->count() < 1) {
        return false;
    }

    $team = Team::where('app_id',0)->get();
    if ($team->count() < 1) {
        return false;
    }

    $visimisi = VisiMisi::where('app_id',1)->first();
    if (!$visimisi) {
        return false;
    }

    $produk = Product::where('app_id',1)->get();
    if ($produk->count() < 1) {
        return false;
    }

    $mark1 = Media::where('mark','porto1')->get();
    if ($mark1->count() < 1) {
        return false;
    }

    $mark2 = Media::where('mark','porto2')->get();
    if ($mark2->count() < 1) {
        return false;
    }

    $why = Media::where('mark','why_us')->get();
    if ($why->count() < 1) {
        return false;
    }

    $penghargaan = Media::where('mark','penghargaan')->get();
    if ($penghargaan->count() < 1) {
        return false;
    }

    $testimoni = Testimoni::where('app_id',1)->get();
    if ($testimoni->count() < 1) {
        return false;
    }

    $mitra = Media::where('mark','mitra')->get();
    if ($mitra->count() < 1) {
        return false;
    }

    $diliput = Media::where('mark','diliput')->get();
    if ($diliput->count() < 1) {
        return false;
    }

    $app = CmsApp::find(1);
    if (!$app) {
        return false;
    }

    // If all checks pass, return true
    return true;
}
function checkPreviewIzidok(){
    $hero = AppHero::where('app_id',2)->first();
    if (!$hero) {
        return false;
    }

    $about =  About::where('app_id',2)->first();
    if (!$about) {
        return false;
    }

    $keunggulan = Keunggulan::with('KeunggulanList')->where('app_id',2)->first();
    if (!$keunggulan) {
        return false;
    }

    $article = Article::where('app_id',2)->orWhere('app_id',0)->get();
    if ($article->count() < 1) {
        return false;
    }

    $plan = Plan::where('app_id',2)
                ->with('details','details.feature')
                ->get();
    if ($plan->count() < 1) {
        return false;
    }

    $ev  = Event::where('app_id',2)->get();
    if ($ev->count() < 1) {
        return false;
    }

    $testi = Testimoni::where('app_id',2)->get();
    if ($testi->count() < 1) {
        return false;
    }

    $contact =  CmsApp::find(2);
    if (!$contact) {
        return false;
    }

    // If all checks pass, return true
    return true;
}
function checkPreviewIziklaim(){
    $hero = AppHero::where('app_id',3)->first();
    if (!$hero) {
        return false;
    }

    $visiMisi = VisiMisi::where('app_id',3)->first();
    if (!$visiMisi) {
        return false;
    }

    $teamUp = Team::where('up_lv',1)->get();
    if ($teamUp->count() < 1) {
        return false;
    }

    $teamDown = Team::where('up_lv',0)->get();
    if ($teamDown->count() < 1) {
        return false;
    }

    $sol = Solution::where('app_id',3)->get();
    if ($sol->count() < 1) {
        return false;
    }

    $prov = Media::whereIn('mark',['provider'])->get();
    if ($prov->count() < 1) {
        return false;
    }

    $provimg = Media::whereIn('title',['provider','client','maps'])->where(['mark'=>'slider'])->get();
    if ($provimg->count() < 1) {
        return false;
    }

    $evt = Event::where('app_id',3)->get();
    if ($evt->count() < 1) {
        return false;
    }

    $contact = CmsApp::find(3);
    if (!$contact) {
        return false;
    }

    $article = Article::where('app_id',3)->orWhere('app_id',0)->get();
    if ($article->count() < 1) {
        return false;
    }

    // If all checks pass, return true
    return true;
}

