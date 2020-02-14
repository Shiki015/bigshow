<?php

namespace app\Controllers;

use app\Config\DB;
use app\Models\Celebrity;


class CelebritiesController extends FrontendController{

    public function __construct()
    {
        parent::__construct();
    }

    Public function celebrityPage()
    {
        $this->loadView("celebrities",$this->data);
    }

    public function celebrityPrinting()
    {
        $model = new Celebrity(DB::instance());
        $celebrity = $model->getAllCelebrity();

        $this->json($celebrity);

    }

}
