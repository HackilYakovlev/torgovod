<?php
/**
 * Created by PhpStorm.
 * User: websp
 * Date: 08.12.2016
 * Time: 15:51
 */

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\AdminLoginForm;
use Yii;

class LoginController extends Controller{
    public function init(){
        $this->layout = 'login';
    }
    public function actionIndex(){
        if (!\Yii::$app->user->isGuest) {
            //return $this->goHome();
            return $this->redirect('/admin/default/index');
        }

        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //return $this->goBack();
            return $this->redirect('/admin/default/index');
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}

