<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\Landing\MedlinxController as LandingMedlinxController;
use App\Http\Controllers\PreviewController;
use App\Http\Controllers\PublishController;
use App\Livewire\Admin\ManageUser;
use App\Livewire\Admin\Section as AdminSection;
use App\Livewire\Pages\About;
use App\Livewire\Pages\CmsApp;
use App\Livewire\Pages\Dashboard;
use App\Livewire\Pages\Event;
use App\Livewire\Pages\Hero\Izidok;
use App\Livewire\Pages\Hero\Iziklaim;
use App\Livewire\Pages\Hero\Medlinx;
use App\Livewire\Pages\Keunggulan\Keunggulan;
use App\Livewire\Pages\News;
use App\Livewire\Pages\News\DetailNews;
use App\Livewire\Pages\News\FormNews;
use App\Livewire\Pages\Plan;
use App\Livewire\Pages\Porto;
use App\Livewire\Pages\PortoEdit;
use App\Livewire\Pages\Produk\Produk;
use App\Livewire\Pages\Produk\ProdukForm;
use App\Livewire\Pages\Provider;
use App\Livewire\Pages\ProviderEdit;
use App\Livewire\Pages\Section;
use App\Livewire\Pages\Slider;
use App\Livewire\Pages\SliderInput;
use App\Livewire\Pages\Solution;
use App\Livewire\Pages\Solution\EditIziklaim;
use App\Livewire\Pages\Solution\Iziklaim as SolutionIziklaim;
use App\Livewire\Pages\Solution\Medlinx as SolutionMedlinx;
use App\Livewire\Pages\Starter;
use App\Livewire\Pages\VisiMisi;
use App\Livewire\Pages\VisiMisi\FormVisiMisi;
use App\Livewire\Pages\Teams;
use App\Livewire\Pages\TeamsEdit;
use App\Livewire\Pages\Testimoni\FormTestimoni;
use App\Livewire\Pages\Testimoni\Testimoni;
use App\Livewire\Pages\VisiMisi\FormIziklaimVisiMisi;
use App\Livewire\Pages\VisiMisi\VisiMisiiziklaim;
use App\Livewire\Pages\WhyUs\WhyUs;
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
    return redirect()->route('login');
});
Route::group(['middleware' => ['guest']], function () {
    Route::get('/login',[AuthController::class,'login'])->name('login');
    Route::post('/login',[AuthController::class,'authenticate'])->name('auth.post');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/set-cms',[AuthController::class,'setCms'])->name('set.cms');
    Route::get('/set-cms-id/{cmsId}',[AuthController::class,'setCmsId'])->name('cms.set');
    Route::get('/dashboard', Dashboard::class);
    Route::get('/starter', Starter::class);

    Route::get('/cms',CmsApp::class);
    Route::get('/event',Event::class);
    Route::get('/izidok-pricing',Plan::class);
    Route::get('/izidok-about',About::class);

    Route::get('/news',News::class)->name('news');
    Route::get('/news/form/{artikelId?}',FormNews::class)->name('artikel.create');
    Route::get('/news/detail/{artikelId}',DetailNews::class)->name('artikel.detail');

    Route::get('/medlinx-solution',SolutionMedlinx::class);
    Route::get('/iziklaim-solution',SolutionIziklaim::class)->name('solution') ;
    Route::get('/iziklaim-solution-edit/{id}',EditIziklaim::class)->name('solution.edit');

    Route::get('/izidok-hero',Izidok::class);
    Route::get('/iziklaim-hero',Iziklaim::class);
    Route::get('/medlinx-hero',Medlinx::class);

    Route::get('/medlinx-visi-misi',VisiMisi::class)->name('visi-misi.medlinx');
    Route::get('/medlinx-visi-misi/form/{idVisiMisi?}',FormVisiMisi::class)->name('visi-misi.medlinx-form');

    Route::get('/iziklaim-visi-misi',VisiMisiiziklaim::class)->name('visi-misi.iziklaim');
    Route::get('/iziklaim-visi-misi/form/{idVisiMisi?}',FormIziklaimVisiMisi::class)->name('visi-misi.iziklaim-form');

    Route::get('/teams',Teams::class)->name('team');
    Route::get('/teams/{id}',TeamsEdit::class)->name('team.edit');

    Route::get('/provider',Provider::class)->name('provider');
    Route::get('/provider/{id}',ProviderEdit::class)->name('provider.edit');

    Route::get('/slider',Slider::class);
    Route::get('/slider/{id}',SliderInput::class)->name('slider.inp');

    Route::get('/medlinx-testimoni',Testimoni::class)->name('medlinx-testimoni');
    Route::get('/izidok-testimoni',Testimoni::class)->name('izidok-testimoni');

    Route::get('/medlinx-testimoni/form/{idTestimoni?}',FormTestimoni::class)->name('testimoni-medlinx.form');
    Route::get('/izidok-testimoni/form/{idTestimoni?}',FormTestimoni::class)->name('izidok-testimoni.form');

    Route::get('/izidok-keunggulan',Keunggulan::class);

    Route::get('/medlinx-produk',Produk::class)->name('produk');
    Route::get('/medlinx-produk/form/{idproduk?}',ProdukForm::class)->name('produck-form');

    Route::get('/porto',Porto::class);
    Route::get('/porto/{id}',PortoEdit::class);

    Route::get('/medlinx-why-us',WhyUs::class)->name('why-use');

    Route::controller(HelperController::class)->group(function(){
        Route::get('/newsOper/{AppIdArray}/{app?}','newsOper')->name('News.oper');
        Route::post('/imageCkEditor','UploadImageCkEditor')->name('image.upload');
    });
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');

    Route::get('/section', Section::class);
    Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){
        Route::get('/section',AdminSection::class);
        Route::get('/users',ManageUser::class);
    });


    Route::get('/prev/{slug?}',[PreviewController::class,'index'])->name('preview');
    Route::get('/view/news/{cms?}', [PreviewController::class,'newsUpdate'])->name('news-update');
    Route::get('/view/news/{cms?}/{slug}', [PreviewController::class,'newsUpdateDetail'])->name('news-update-detail');

    Route::post('publish',[PreviewController::class,'publish'])->name('publish');

    Route::post('publish-izidok',[PublishController::class,'publishIzidok'])->name('publish.izidok');
    Route::post('publish-iziklaim',[PublishController::class,'publishIziklaim'])->name('publish.iziklaim');
    Route::post('publish-madlinx',[PublishController::class,'PublisMedlinx'])->name('publish.medlinx');

});


Route::group(['prefix' => 'medlinx'], function () {
    Route::get('/detail-news/{slug}',[LandingMedlinxController::class,'NewsDetail'])->name('medlinx.news-detail');
    Route::get('/detail-news-prev/{prev}',[LandingMedlinxController::class,'prevDetailNews'])->name('medlinx.news-detail-prev');
    Route::get('/home',[LandingMedlinxController::class,'index'])->name('medlinx.home');
    Route::post('/send-message',[LandingMedlinxController::class,'sendMessage'])->name('send-message');
    Route::get('/all-news/{cms?}',[LandingMedlinxController::class,'ListNews'])->name('publis-medlinx');
    Route::get('/detail-news-medlix/{slug}',[LandingMedlinxController::class,'DetailNewsPublis'])->name('medlinx.news-detail');
});
