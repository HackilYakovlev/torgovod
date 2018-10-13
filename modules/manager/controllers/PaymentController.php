<?php

namespace app\modules\manager\controllers;

use app\models\Bill;
use app\modules\manager\components\ManagerController;
use Yii;
use yii\db\Query;

class PaymentController extends ManagerController{

    public function actionIndex(){
        if (!Yii::$app->user->getIsGuest()){
            $userid = Yii::$app->user->id;

            //извлекаем сумму на счете пользователя
            $bill_rows = Bill::find()
                ->filterWhere(['userid' => $userid])
                ->one();

            //извлекаем тариф из таблицы пользователя и таблицы тарифоф/
            $tariff_rows = (new Query())
                ->select(['user.tariff', 'tariff.name', 'tariff.price'])
                ->from('user')
                ->leftJoin('tariff', 'user.tariff=tariff.id')
                ->where(['user.id' => $userid])
                ->one();
        }


        return $this->render('index',
            ['tariff_rows' => $tariff_rows,
                'bill_rows' => $bill_rows]
        );
    }

}