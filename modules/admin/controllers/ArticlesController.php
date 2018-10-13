<?php

namespace app\modules\admin\controllers;

use app\modules\admin\components\AdminController;
use Yii;
use app\models\Articles;
use app\controllers\ArticlesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArticlesController implements the CRUD actions for Articles model.
 */
class ArticlesController extends AdminController
{
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

    /**
     * Displays a single Articles model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Articles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Articles();

        $model->setAttribute('pub_date', time());

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Articles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Articles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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

    public function actionImageload()
    {
        $uploadedFile = UploadedFile::getInstanceByName('upload');
        $mime = \yii\helpers\FileHelper::getMimeType($uploadedFile->tempName);
        $file = time()."_".$uploadedFile->name;

        $url = Yii::$app->urlManager->createAbsoluteUrl('/uploads/ckeditor/'.$file);
        $uploadPath = Yii::getAlias('@webroot').'/uploads/ckeditor/'.$file;
        //extensive suitability check before doing anything with the file…
        if ($uploadedFile==null)
        {
            $message = "No file uploaded.";
        }
        else if ($uploadedFile->size == 0)
        {
            $message = "The file is of zero length.";
        }
        else if ($mime!="image/jpeg" && $mime!="image/png")
        {
            $message = "The image must be in either JPG or PNG format. Please upload a JPG or PNG instead.";
        }
        else if ($uploadedFile->tempName==null)
        {
            $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
        }
        else {
            $message = "";
            $move = $uploadedFile->saveAs($uploadPath);
            if(!$move)
            {
                $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
            }
        }
        $funcNum = $_GET['CKEditorFuncNum'] ;

        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";

    }

}
