<?php

use App\Models\CmsApp;
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

