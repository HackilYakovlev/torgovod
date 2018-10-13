<?php

namespace app\controllers;

use app\components\MainController;
use app\models\Articles;
use Yii;

class ArticlesController extends MainController
{
    public function actionIndex()
    {
        $articles_list = Articles::find()->orderBy(['pub_date'=>SORT_DESC])->all();

        return $this->render('index', [
            'articles_list'=>$articles_list
        ]);
    }

    public function actionArticle()
    {
        $num = (int)Yii::$app->request->get('num');
        $article = Articles::find()->where(['id'=>$num])->one();
        return $this->render('article', [
            'article'=>$article
        ]);
    }

}
