<?php

use App\Http\Controllers\AuthController;
use App\Livewire\Pages\CmsApp;
use App\Livewire\Pages\Event;
use App\Livewire\Pages\Plan;
use App\Livewire\Pages\Section;
use App\Livewire\Pages\Solution;
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

    Route::get('/starter', Starter::class);
    Route::get('/cms',CmsApp::class);
    Route::get('/event',Event::class);
    Route::get('/pricing',Plan::class);
    Route::get('/solution',Solution::class);

    Route::get('/app-section', Section::class);

    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
});

