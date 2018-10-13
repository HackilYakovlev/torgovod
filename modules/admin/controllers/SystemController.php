<?php

namespace app\modules\admin\controllers;

use app\modules\admin\components\AdminController;
use Yii;
use app\models\Articles;
use app\controllers\ArticlesSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticlesController implements the CRUD actions for Articles model.
 */
class SystemController extends AdminController
{
    public $sitemap;
    public $resource = 'public_html/sitemap.xml';
    public $message = '';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Articles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticlesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSitemapgenerate()
    {
        $this->sitemap = '<?xml version="1.0" encoding="UTF-8"?>
                            <urlset
                              xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
                              xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                              xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                                    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

        $articles = Articles::find()
            ->orderBy([
                'id' => SORT_DESC
            ])
            ->limit(20)
            ->all();

        if (count($articles)>0){
            foreach ($articles as $article) {
                $this->sitemap .= "\n";
                $this->sitemap .= '<url>';
                $this->sitemap .= "\n";
                $this->sitemap .= '<loc>https://torgovod.ru/articles/article?num=' . $article->id . '</loc>';
                $this->sitemap .= "\n";
                $this->sitemap .= '</url>';
            }
        }

        $this->sitemap.="\n";
        $this->sitemap.='<url>';
        $this->sitemap.="\n";
        $this->sitemap.='<loc>https://torgovod.ru/</loc>';
        $this->sitemap.="\n";
        $this->sitemap.='</url>';
        $this->sitemap.="\n";
        $this->sitemap.='<url>';
        $this->sitemap.="\n";
        $this->sitemap.='<loc>https://torgovod.ru/prices/index</loc>';
        $this->sitemap.="\n";
        $this->sitemap.='</url>';
        $this->sitemap.="\n";
        $this->sitemap.='<url>';
        $this->sitemap.="\n";
        $this->sitemap.='<loc>https://torgovod.ru/contacts/index</loc>';
        $this->sitemap.="\n";
        $this->sitemap.='</url>';
        $this->sitemap.="\n";
        $this->sitemap.='<url>';
        $this->sitemap.="\n";
        $this->sitemap.='<loc>https://torgovod.ru/database/index</loc>';
        $this->sitemap.="\n";
        $this->sitemap.='</url>';
        $this->sitemap.="\n";
        $this->sitemap.='<url>';
        $this->sitemap.="\n";
        $this->sitemap.='<loc>https://torgovod.ru/articles/index</loc>';
        $this->sitemap.="\n";
        $this->sitemap.='</url>';
        $this->sitemap.="\n";

        $this->sitemap.='</urlset>';

        if (!$fp = fopen(\Yii::getAlias('@app/'.$this->resource), 'w+')){
            $this->message = 'Невозможно открыть файл';
        }
        if (fwrite($fp, $this->sitemap)){
            $this->message = 'Карта сайта сгенерирована';
            $this->message.= "<br />";
        }
        fclose($fp);

        $gfile = fopen('http://google.com/webmasters/tools/ping?sitemap=https://torgovod.ru/sitemap.xml', 'r');
        while(!feof($gfile)){
            $this->message.=fread($gfile, 1000);
        }
        fclose($gfile);

        return $this->render('sitemapgenerate', [
            'message' => $this->message,
        ]);

    }

    /**
     * Finds the Articles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



}
