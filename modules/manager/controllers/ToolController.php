<?php

namespace app\modules\manager\controllers;

use app\modules\manager\components\ManagerController;
use yii\web\Controller;

class ToolController extends ManagerController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAdvertising()
    {
        return $this->render('advertising');
    }

    public function actionExport()
    {
        return $this->render('export');
    }

}