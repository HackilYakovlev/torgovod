<?php

namespace app\modules\manager\controllers;

use app\models\ObjectImages;
use app\models\ObjectWorkedSearch;
use app\modules\manager\components\ManagerController;
use yii\web\Controller;
use app\models\UploadForm;
use app\models\ObjectOptions;
use app\models\ObjectWorked;
use app\models\object;
use Yii;

class EstateController extends ManagerController
{
    public function actionIndex()
    {
        $userid = Yii::$app->user->id;
        $searchModel = new ObjectWorkedSearch();

        $queryParams = Yii::$app->request->queryParams;
        $queryParams['ObjectSearch']['userid'] = $userid;
        $dataProvider = $searchModel->searchWithImage($queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new ObjectWorked();
        $upload = new UploadForm();
        $object_images = new ObjectImages();

        //получаем дополнительные поля
        $options = ObjectOptions::find()->asArray()->all();

        $model->setAttribute('pubdate', time());

        if ($model->load(Yii::$app->request->post())){
            $model->userid = Yii::$app->user->id;
            if ($model->save()){
                $lastid = $model->id;
                if (isset($_POST['images'][0])){
                    foreach ($_POST['images'] as $key=>$value){
                        $object_images->setAttribute('image', $value);
                        $object_images->setAttribute('objectid', $lastid);
                        if ($object_images->validate()){
                            $object_images->save();
                        }
                    }
                }
                return $this->redirect('index');
            }
        }

         else {
            return $this->render('create', [
                'options' => $options,
                'model' => $model,
                'upload' => $upload
            ]);
        }
    }


    /**
     * Updates an existing Object model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $upload = new UploadForm();
        $object_images = new ObjectImages();

        //получаем дополнительные поля
        $options = ObjectOptions::find()->asArray()->all();

        $model->setAttribute('pubdate', time());

        if (!empty($_POST['Object'])){
//            p($_POST);
//            exit;
        }

        if ($model->load(Yii::$app->request->post())){
            $model->userid = Yii::$app->user->id;
            if ($model->save()){
                $lastid = $model->id;
                if (isset($_POST['images'][0])){
                    foreach ($_POST['images'] as $key=>$value){
                        $object_images->setAttribute('image', $value);
                        $object_images->setAttribute('objectid', $lastid);
                        if ($object_images->validate()){
                            $object_images->save();
                        }
                    }
                }
                return $this->redirect('index');
            }
        }

        else {
            return $this->render('create', [
                'options' => $options,
                'model' => $model,
                'upload' => $upload
            ]);
        }   
    }

    /**
     * Deletes an existing Object model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Object model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Object the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ObjectWorked::find()->filterWhere(['original_id'=>$id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}