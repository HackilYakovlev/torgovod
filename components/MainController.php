<?php

namespace app\components;

use yii\web\Controller;
use Yii;

class MainController extends Controller {

    public function init()
    {
        if (!\Yii::$app->user->isGuest && Yii::$app->request->url!='/site/logout') {
            return $this->redirect('/manager/default/index');
        }
    }
}