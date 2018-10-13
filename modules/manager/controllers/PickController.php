<?php

namespace app\modules\manager\controllers;

use yii\web\Controller;

class PickController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}