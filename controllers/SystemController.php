<?php

namespace app\controllers;

class SystemController extends \app\components\MainController {

    public function actionIndex()
    {
        return $this->render('index');
    }

}