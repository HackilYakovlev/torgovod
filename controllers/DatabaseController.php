<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 03.01.2016
 * Time: 22:54
 */

namespace app\controllers;

use app\components\MainController;
use yii\web\Controller;

class DatabaseController extends MainController {

    public function actionIndex(){
        return $this->render('index');
    }
}