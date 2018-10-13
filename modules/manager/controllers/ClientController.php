<?php

namespace app\modules\manager\controllers;

use app\modules\manager\components\ManagerController;
use yii\web\Controller;
use app\models\Client;
use app\models\ClientSearch;
use Yii;

class ClientController extends ManagerController
{
    public function actionIndex()
    {
        $searchModel = new ClientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Client();
        if ($model->load(Yii::$app->request->post()))
        {
            $model->setAttribute('userid', Yii::$app->user->id);
            $model->setAttribute('dateadded', time());
            if ($model->validate()){
                if ($model->save(false)){
                    $this->redirect('/manager/client/index');
                }
            }
        }
        return $this->render('create', ['model'=>$model]);
    }

    public function actionDelete()
    {
        $id = (int)Yii::$app->getRequest()->getQueryParam('id');
        $model = new Client();
        $model->deleteAll('id IN ('.$id.')');
        $this->redirect('/manager/client/index/');
    }

}