<?php

namespace app\controllers;

use yii\web\Controller;

class KassaController extends Controller
{
    //---------------------WORKED------------------------------------//

    /**
     * @return string
     */

    public function actionPay()
    {
        return $this->render('pay');
    }

    public function actionAviso()
    {
        return $this->render('aviso');
    }

    public function actionCheckurl()
    {
        return $this->render('checkurl');
    }

    public function actionSuccess()
    {
        return $this->render('success');
    }

    public function actionFail()
    {
        return $this->render('fail');
    }

    //----------------------TEST------------------------------------//

    /**
     * @return string
     */

    public function actionPaytest()
    {
        return $this->render('paytest');
    }

    public function actionAvisotest()
    {
        return $this->render('avisotest');
    }

    public function actionCheckurltest()
    {
        return $this->render('checkurltest');
    }

    public function actionSuccesstest()
    {
        return $this->render('successtest');
    }

    public function actionFailtest()
    {
        return $this->render('failtest');
    }

}
