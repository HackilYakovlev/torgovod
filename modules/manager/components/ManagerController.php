<?php

namespace app\modules\manager\components;

use yii\web\Controller;
use Yii;

class ManagerController extends Controller {

    public function init(){
        $this->_checkIsGuest();
    }

    private function _checkIsGuest(){
        if(!isset(Yii::$app->user->id))
        {
            return $this->redirect('/site/login');
            exit;
        }

    }

}