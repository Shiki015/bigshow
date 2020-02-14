<?php


namespace app\Controllers;


use app\Config\DB;
use app\Models\Filmovi;
use app\Models\Frontend;


class FrontendController extends Controller {

    protected  $data;

    protected  function __construct()
    {
        $model = new Frontend(DB::instance());
        $navigation= $model->getNavigation();

        $this->data["navigacija"] = $navigation;
    }



}