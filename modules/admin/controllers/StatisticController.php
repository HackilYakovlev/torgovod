<?php

namespace app\modules\admin\controllers;

use app\modules\admin\components\AdminController;

class StatisticController extends AdminController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
