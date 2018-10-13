<?php

namespace app\controllers;

use app\models\Object;
use yii\data\Pagination;
use yii\web\Controller;
use Yii;

class RealtyController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionRent()
    {
        $query = Object::find()
            ->andFilterWhere(['operationtypeid' => 1])
//            ->leftJoin('object_images')
//            ->on('object.id = object_images.object_id')
            ->orderBy(['object.id'=>SORT_DESC]);
        $countQuery = clone $query;

        $pages = new Pagination(['totalCount'=>$countQuery->count(), 'pageSize'=>10]);
        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('rent', [
            'models' => $models,
            'pages' => $pages,
        ]);


    }

    public function actionSale()
    {
        $query = Object::find()
            ->andFilterWhere(['operationtypeid' => 1])
//            ->leftJoin('object_images')
//            ->on('object.id = object_images.object_id')
            ->orderBy(['object.id'=>SORT_DESC]);
        $countQuery = clone $query;

        $pages = new Pagination(['totalCount'=>$countQuery->count(), 'pageSize'=>10]);
        $pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('sale', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }

    public function actionObject()
    {
        $num = (int)Yii::$app->request->getQueryParam('num');
        $object = Object::find()
            ->where(['id'=>$num])
            ->one();
        return $this->render('object', ['object'=>$object]);
    }

}
