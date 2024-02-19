<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HelperController;
use App\Livewire\Pages\About;
use App\Livewire\Pages\CmsApp;
use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Event;
use App\Livewire\Pages\Hero\Izidok;
use App\Livewire\Pages\Hero\Iziklaim;
use App\Livewire\Pages\Hero\Medlinx;
use App\Livewire\Pages\News;
use App\Livewire\Pages\News\DetailNews;
use App\Livewire\Pages\News\FormNews;
use App\Livewire\Pages\Plan;
use App\Livewire\Pages\Section;
use App\Livewire\Pages\Solution;
use App\Livewire\Pages\Solution\Iziklaim as SolutionIziklaim;
use App\Livewire\Pages\Solution\Medlinx as SolutionMedlinx;
use App\Livewire\Pages\Starter;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',function(){
    return redirect('/login');
});
Route::group(['middleware' => ['guest']], function () {
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login',[AuthController::class,'authenticate'])->name('auth.post');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/set-cms',[AuthController::class,'setCms'])->name('set.cms');
    Route::get('/set-cms-id/{cmsId}',[AuthController::class,'setCmsId'])->name('cms.set');
    Route::get('/app-section', Section::class);
    Route::get('/dashboard', Dashboard::class);
    Route::get('/starter', Starter::class);


    Route::get('/cms',CmsApp::class);
    Route::get('/event',Event::class);
    Route::get('/izidok-pricing',Plan::class);
    Route::get('/about',About::class);]
    Route::get('/news/form/{artikelId?}',FormNews::class)->name('artikel.create');
    Route::get('/news/detail/{artikelId}',DetailNews::class)->name('artikel.detail');

    Route::get('/medlinx-solution',SolutionMedlinx::class);
    Route::get('/iziklaim-solution',SolutionIziklaim::class);

    Route::get('/izidok-hero',Izidok::class);
    Route::get('/iziklaim-hero',Iziklaim::class);
    Route::get('/medlinx-hero',Medlinx::class);


    Route::controller(HelperController::class)->group(function(){
        Route::post('/imageCkEditor','UploadImageCkEditor')->name('image.upload');
    });

    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
});

