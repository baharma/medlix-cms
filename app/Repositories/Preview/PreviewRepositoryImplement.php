<?php

namespace App\Repositories\Preview;

use App\Models\Article;
use App\Models\Keunggulan;
use App\Models\KeunggulanList;
use App\Models\MainArticle;
use App\Models\MainCmsApp;
use App\Models\MainKeunggulan;
use App\Models\MainKeunggulanList;
use App\Models\MainMedia;
use App\Models\MainPlan;
use App\Models\MainPlanDetail;
use App\Models\MainPlanFeatue;
use App\Models\MainSolution;
use App\Models\MainTestimoni;
use App\Models\MainVisiMisi;
use App\Models\Media;
use App\Models\Plan;
use App\Models\PlanDetail;
use App\Models\PlanFeatue;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Preview;
use App\Models\Solution;
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
            DB::transaction(function () use ($plan) {
                if ($originalPlan = MainPlan::find($plan->id)) {
                    $originalPlan->delete();
                }

                MainPlan::updateOrCreate(
                    ['id' => $plan->id],
                    $plan->attributesToArray()
                );
            });

            return [
                'success' => true,
                'message' => 'Success Save And Delete Plan.',
            ];
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

                MainPlanDetail::updateOrCreate(
                    ['id' => $planDetail->id],
                    $planDetail->attributesToArray()
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

                MainPlanFeatue::updateOrCreate(
                    ['id' => $planFeatue->id],
                    $planFeatue->attributesToArray()
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

                MainTestimoni::updateOrCreate(
                    ['id' => $testimoni->id],
                    $testimoni->attributesToArray()
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
    public function deleteAddnewMain(Article $article){
        try {
            DB::transaction(function () use ($article) {
                if ($mainArticle = MainArticle::find($article->id)) {
                    $mainArticle->delete();
                }

                MainArticle::updateOrCreate(
                    ['id' => $article->id],
                    $article->attributesToArray()
                );
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

                MainKeunggulan::updateOrCreate(
                    ['id' => $keunggulan->id],
                    $keunggulan->attributesToArray()
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

                MainKeunggulanList::updateOrCreate(
                    ['id' => $keunggulanList->id],
                    $keunggulanList->attributesToArray()
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

    // public function deleteAddSolution(Solution $solution){
    //     try {
    //         DB::transaction(function () use ($solution) {
    //             if ($mainSolution = MainSolution::find($solution->id)) {
    //                 $mainSolution->delete();
    //             }

    //             MainSolution::updateOrCreate(
    //                 ['id' => $solution->id],
    //                 $solution->attributesToArray()
    //             );
    //         });

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Successfully deleted and updated MainSolution.',
    //         ], 200);
    //     } catch (\Throwable $e) {
    //         report($e);

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'An error occurred while processing the request.',
    //         ], 500);
    //     }
    // }

    // public function deleteAddVisiMisi(VisiMisi $visiMisi){
    //     try {
    //         DB::transaction(function () use ($visiMisi) {
    //             if ($mainVisiMisi = MainVisiMisi::find($visiMisi->id)) {
    //                 $mainVisiMisi->delete();
    //             }

    //             MainVisiMisi::updateOrCreate(
    //                 ['id' => $visiMisi->id],
    //                 $visiMisi->attributesToArray()
    //             );
    //         });

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Successfully deleted and updated MainVisiMisi.',
    //         ], 200);
    //     } catch (\Throwable $e) {
    //         report($e);

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'An error occurred while processing the request.',
    //         ], 500);
    //     }
    // }

    // public function deleteAddMedia(Media $media){
    //     try {
    //         DB::transaction(function () use ($media) {
    //             if ($mainMedia = MainMedia::find($media->id)) {
    //                 $mainMedia->delete();
    //             }

    //             MainMedia::updateOrCreate(
    //                 ['id' => $media->id],
    //                 $media->attributesToArray()
    //             );
    //         });

    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Successfully deleted and updated MainMedia.',
    //         ], 200);
    //     } catch (\Throwable $e) {
    //         report($e);

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'An error occurred while processing the request.',
    //         ], 500);
    //     }
    // }

}
