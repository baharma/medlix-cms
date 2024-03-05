<?php

namespace App\Repositories\Preview;

use App\Models\About;
use App\Models\AppHero;
use App\Models\Article;
use App\Models\Event;
use App\Models\Keunggulan;
use App\Models\KeunggulanList;
use App\Models\MainAbout;
use App\Models\MainAppHero;
use App\Models\MainArticle;
use App\Models\MainCmsApp;
use App\Models\MainEvent;
use App\Models\MainKeunggulan;
use App\Models\MainKeunggulanList;
use App\Models\MainMedia;
use App\Models\MainPlan;
use App\Models\MainPlanDetail;
use App\Models\MainPlanFeatue;
use App\Models\MainProduct;
use App\Models\MainSolution;
use App\Models\MainTeam;
use App\Models\MainTestimoni;
use App\Models\MainVisiMisi;
use App\Models\Media;
use App\Models\Plan;
use App\Models\PlanDetail;
use App\Models\PlanFeatue;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Preview;
use App\Models\Product;
use App\Models\Solution;
use App\Models\Team;
use App\Models\Testimoni;
use App\Models\VisiMisi;
use Exception;
use Illuminate\Support\Facades\DB;

class PreviewRepositoryImplement extends Eloquent implements PreviewRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(MainCmsApp $model)
    {
        $this->model = $model;
    }

    public function deletePlanAndAddMain(Plan $plan){
        try {
            $data = null;
            DB::transaction(function () use ($plan, &$data) {
                if ($originalPlan = MainPlan::find($plan->id)) {
                    $originalPlan->delete();
                }
               $data =  MainPlan::create([
                    'id'=>$plan->id,
                    'app_id' => $plan->app_id,
                    'name' => $plan->name,
                    'duration' => $plan->duration,
                    'amount'=> $plan->amount,
                    'best_seller' => $plan->best_seller
                    ]);
            });

            return $data;
        } catch (\Throwable $e) {
            return [
                'success' => false,
                'message' => 'Error: ' . $e->getMessage(),
            ];
        }
    }

    public function deletePlanDetailAddMain(PlanDetail $planDetail){
        try {
            DB::transaction(function () use ($planDetail) {
                if ($mainDetail = MainPlanDetail::find($planDetail->id)) {
                    $mainDetail->delete();
                }

                MainPlanDetail::create(
                  [
                    "id" => $planDetail->id,
                    "plan_id" => $planDetail->plan_id,
                    "feature_id" => $planDetail->plan_id,
                    "check" => $planDetail->plan_id,
                    "created_at" => $planDetail->created_at,
                    "updated_at" =>$planDetail->updated_at
                  ]
                );
            });

            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted and recreated MainPlanDetail.'
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the request.'
            ]);
        }
    }
    public function deletePlanFeatureAddMain(PlanFeatue $planFeatue){
        try {
            DB::transaction(function () use ($planFeatue) {
                if ($mainFeature = MainPlanFeatue::find($planFeatue->id)) {
                    $mainFeature->delete();
                }

                MainPlanFeatue::create(
                 [
                    "id" => $planFeatue->id,
                    "name" => $planFeatue->name,
                    "status" => $planFeatue->status,
                    "created_at" =>$planFeatue->created_at,
                    "updated_at" => $planFeatue->updated_at,
                 ]
                );
            });

            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted and recreated MainPlanFeatue.'
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the request.'
            ]);
        }
    }

    public function deleteAddTestimomni(Testimoni $testimoni){
        try {
            DB::transaction(function () use ($testimoni) {
                if ($mainTestimonial = MainTestimoni::find($testimoni->id)) {
                    $mainTestimonial->delete();
                }

                MainTestimoni::create(
                  [
                    "id" => $testimoni->id,
                    "app_id" => $testimoni->app_id,
                    "testi" => $testimoni->testi,
                    "testi_by" => $testimoni->testi_by,
                    "testi_by_title" => $testimoni->testi_by_title,
                    "testi_by_img" =>$testimoni->testi_by_img,
                    "created_at" => $testimoni->created_at,
                    "updated_at" =>$testimoni->updated_at
                  ]
                );
            });

            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted and updated MainTestimoni.'
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the request.'
            ]);
        }
    }
    public function deleteAddArticle(Article $article){
        try {
            DB::transaction(function () use ($article) {
                if ($mainArticle = MainArticle::find($article->id)) {
                    $mainArticle->delete();
                }

                MainArticle::create([
                    "id" => $article->id,
                    "app_id" => $article->app_id,
                    "slug" => $article->slug,
                    "title" => $article->title,
                    "thumbnail" => $article->thumbnail,
                    "description" =>$article->description,
                    "check" => $article->description
                ]);
            });

            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted and updated MainArticle.'
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the request.'
            ]);
        }
    }

    public function deleteAddKeunggulan(Keunggulan $keunggulan){
        try {
            DB::transaction(function () use ($keunggulan) {
                if ($mainAdvantage = MainKeunggulan::find($keunggulan->id)) {
                    $mainAdvantage->delete();
                }

                MainKeunggulan::create(
                   [
                    "id" => $keunggulan->id,
                    "app_id" => $keunggulan->app_id,
                    "title" =>$keunggulan->title,
                    "description" => $keunggulan->description,
                    "image_title" => $keunggulan->image_title,
                    "image" => $keunggulan->image
                   ]
                );
            });

            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted and updated MainKeunggulan.'
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the request.'
            ]);
        }
    }

    public function deleteAddKeunggulanListMain(KeunggulanList $keunggulanList){
        try {
            DB::transaction(function () use ($keunggulanList) {
                if ($mainAdvantagesList = MainKeunggulanList::find($keunggulanList->id)) {
                    $mainAdvantagesList->delete();
                }
                MainKeunggulanList::create(
                    [
                        "id" => $keunggulanList->id,
                        "keunggulan_id" => $keunggulanList->keunggulan_id,
                        "title" => $keunggulanList->title,
                        "image" => $keunggulanList->image
                    ]
                );
            });

            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted and updated MainKeunggulanList.'
            ]);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the request.'
            ]);
        }
    }

    public function deleteAddSolution(Solution $solution){
        try {
            DB::transaction(function () use ($solution) {
                if ($mainSolution = MainSolution::find($solution->id)) {
                    $mainSolution->delete();
                }
                MainSolution::create(
                    [
                        "id" => $solution->id,
                        "app_id" => $solution->app_id,
                        "title" => $solution->title,
                        "sub_title" => $solution->sub_title,
                        "extend" => $solution->extend
                    ]
                );
            });

            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted and updated MainSolution.',
            ], 200);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the request.',
            ], 500);
        }
    }

    public function deleteAddVisiMisi(VisiMisi $visiMisi){
        try {
            DB::transaction(function () use ($visiMisi) {
                if ($mainVisiMisi = MainVisiMisi::find($visiMisi->id)) {
                    $mainVisiMisi->delete();
                }
                MainVisiMisi::create(
                   [
                    "id" => $visiMisi->id,
                    "app_id" => $visiMisi->app_id,
                    "visi" => $visiMisi->visi,
                    "misi" =>$visiMisi->misi,
                    "visi_img" => $visiMisi->visi_img ?? null,
                    "misi_img" => $visiMisi->misi_img ?? null,
                    "detail_img" => $visiMisi->detail_img ?? null
                   ]
                );
            });

            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted and updated MainVisiMisi.',
            ], 200);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the request.',
            ], 500);
        }
    }

    public function deleteAddMedia(Media $media){
        try {
            DB::transaction(function () use ($media) {
                if ($mainMedia = MainMedia::find($media->id)) {
                    $mainMedia->delete();
                }
                MainMedia::updateOrCreate([
                    "id" => $media->id,
                    "title" => $media->title,
                    "text" => $media->text,
                    "images" => $media->images,
                    "url" => $media->url,
                    "mark" => $media->mark
                ]);
            });

            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted and updated MainMedia.',
            ], 200);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the request.',
            ], 500);
        }
    }

    public function deleteAddEvent(Event $event){
        try {
            DB::transaction(function () use ($event) {
                if ($mainEvent = MainEvent::find($event->id)) {
                    $mainEvent->delete();
                }

                MainEvent::create([
                    "id" => $event->id,
                    "app_id" =>$event->app_id,
                    "name" => $event->name,
                    "image" => $event->image,
                    "details"=>$event->details
                ]);
            });
            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted and updated Event.',
            ], 200);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the request.',
            ], 500);
        }
    }
    public function deleteAddHero(AppHero $appHero){
        try {
            DB::transaction(function () use ($appHero) {
                if ($mainAppHero = MainAppHero::find($appHero->id)) {
                    $mainAppHero->delete();
                }
                MainAppHero::create([
                    "id" => $appHero->id,
                    "app_id" => $appHero->app_id,
                    "image" => $appHero->image,
                    "title" => $appHero->title,
                    "subtitle" => $appHero->subtitle,
                    "extend" => $appHero->extend
                ]);
            });
            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted and updated Event.',
            ], 200);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the request.',
            ], 500);
        }
    }

    public function deleteAddAbout(About $about){
        try {
            DB::transaction(function () use ($about) {
                if ($mainAbout = MainAbout::find($about->id)) {
                    $mainAbout->delete();
                }
                MainAbout::create([
                    "id" => $about->id,
                    "app_id" => $about->app_id,
                    "image" => $about->image,
                    "title" => $about->title,
                    "list" =>$about->list
                ]);
            });
            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted and updated Event.',
            ], 200);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the request.',
            ], 500);
        }
    }

    public function deleteAddTeam(Team $team){
        try {
            DB::transaction(function () use ($team) {
                if ($mainTeam = MainTeam::find($team->id)) {
                    $mainTeam->delete();
                }
                MainTeam::create([
                    "id" => $team->id,
                    "app_id" => $team->app_id,
                    "image" => $team->image,
                    "name" => $team->name,
                    "title" => $team->title,
                    "up_lv" => $team->up_lv
                ]);
            });
            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted and updated Event.',
            ], 200);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the request.',
            ], 500);
        }
    }

    public function deleteAddProduct(Product $product){
        try {
            DB::transaction(function () use ($product) {
                if ($mainProduct = MainProduct::find($product->id)) {
                    $mainProduct->delete();
                }
                MainProduct::create([
                    "id" => $product->id,
                    "app_id" => $product->app_id,
                    "image" => $product->image,
                    "logo" =>$product->logo,
                    "text" => $product->text,
                    "url" => $product->url
                ]);
            });
            return response()->json([
                'success' => true,
                'message' => 'Successfully deleted and updated Product.',
            ], 200);
        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing the request.',
            ], 500);
        }
    }
}
