<?php

namespace app\modules\api\controllers;

use yii\web\Controller;
use app\models\Order;
use yii\helpers\ArrayHelper;

class OutputController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetneworders()
    {
        $order = new Order();
        $new_orders_obj = $order->find()
            ->filterWhere(['synchronized' => 0])
            ->filterWhere(['publish' => 1])
            ->all();
        $new_orders = ArrayHelper::toArray($new_orders_obj);
        return json_encode($new_orders);
    }

}
