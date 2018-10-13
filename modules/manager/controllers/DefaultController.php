<?php

namespace app\modules\manager\controllers;

use app\models\Tariff;
use app\modules\manager\components\ManagerController;
use Yii;
use yii\db\Query;
use app\models\Bill;

class DefaultController extends ManagerController
{
    public function actionIndex()
    {
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

    public function actionRegistrationcomplete()
    {
        return $this->render('registrationcomplete');
    }

}
