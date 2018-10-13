<?php
/**
 * Created by PhpStorm.
 * User: websp
 * Date: 08.12.2016
 * Time: 15:23
 */

namespace app\modules\admin\components;

use Yii;
use yii\web\Controller;

class AdminController extends Controller {
    public function init(){
        $this->_checkIsGuest();
    }

    private function _checkIsGuest(){
        if (!\Yii::$app->user->isGuest){
            return $this->redirect('/admin/login/index');
            exit;
        }
    }
}