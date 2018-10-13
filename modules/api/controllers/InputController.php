<?php

namespace app\modules\api\controllers;

use yii\web\Controller;
use app\models\Order;

class InputController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUpdateorderstatus()
    {
        $orderid = (int)$_GET['orderid'];
        $order = Order::find($orderid)->one();
        $order->synchronized = 1;
        if ($order->save()){
            return true;
        }
        else {
            return false;
        }
    }
}
