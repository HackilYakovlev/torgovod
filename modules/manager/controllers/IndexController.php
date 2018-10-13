<?php

namespace app\modules\manager\controllers;

use app\modules\manager\components\ManagerController;

class IndexController extends ManagerController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}