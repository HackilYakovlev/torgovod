<?php

namespace app\controllers;

use app\components\MainController;
use yii\data\Pagination;
use yii\db\Query;

class PricesController extends MainController
{
    public function actionIndex()
    {
        return $this->render('index');
    }



}
