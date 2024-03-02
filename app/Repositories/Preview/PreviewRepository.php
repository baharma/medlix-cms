<?php

namespace App\Repositories\Preview;

use App\Models\Article;
use App\Models\Keunggulan;
use App\Models\KeunggulanList;
use App\Models\Media;
use App\Models\Plan;
use App\Models\PlanDetail;
use App\Models\PlanFeatue;
use App\Models\Solution;
use App\Models\Testimoni;
use App\Models\VisiMisi;
use LaravelEasyRepository\Repository;

interface PreviewRepository extends Repository{

    public function deletePlanAndAddMain(Plan $plan);
    public function deletePlanDetailAddMain(PlanDetail $planDetail);
    public function deletePlanFeatureAddMain(PlanFeatue $planFeatue);
    public function deleteAddTestimomni(Testimoni $testimoni);
    public function deleteAddnewMain(Article $article);
    public function deleteAddKeunggulan(Keunggulan $keunggulan);
    public function deleteAddKeunggulanListMain(KeunggulanList $keunggulanList);
    public function deleteAddSolution(Solution $solution);
    public function deleteAddVisiMisi(VisiMisi $visiMisi);
    public function deleteAddMedia(Media $media);
}
