<?php

namespace app\modules\admin\controllers;

use app\modules\admin\components\AdminController;
use Yii;

/**
 * ObjectController implements the CRUD actions for Object model.
 */
class InquiryController extends AdminController
{

    public function actionIndex(){
        return $this->render('index');
    }

}