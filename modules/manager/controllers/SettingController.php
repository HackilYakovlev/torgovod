<?php

namespace app\modules\manager\controllers;

use app\modules\manager\components\ManagerController;
use yii\web\Controller;

class SettingController extends ManagerController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}