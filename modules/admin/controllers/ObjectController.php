<?php

namespace app\modules\admin\controllers;

use app\models\ObjectImages;
use app\models\ObjectType;
use app\modules\admin\components\AdminController;
use Yii;
use app\models\Object;
use app\models\ObjectSearch;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ObjectOptions;
use app\models\UploadForm;
use yii\helpers\FileHelper;
use yii\helpers\Json;

/**
 * ObjectController implements the CRUD actions for Object model.
 */
class ObjectController extends AdminController
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

    public function actionObjecttypelists($objectcategoryid)
    {
        $objecttypes = ObjectType::find()->asArray()->where('objectcategoryid IN (' . $objectcategoryid . ')')->all();
        if (count($objecttypes)>0){
            foreach ($objecttypes as $key=>$objecttype){
                echo '<option value="'.$objecttype['id'].'">'.$objecttype['type'].'</option>';
            }
        }
        else{
            echo "<option>-</option>";
        }
    }

    /**
     * Lists all Object models.
     * @return mixed
     */
    public function actionIndex()
    {
        $object_categorys = (new Query())
            ->select(['id', 'category'])
            ->from('object_category')
            ->all();

        foreach ($object_categorys as $ckey=>$cvalue){
            $object_categorys_array[$cvalue['id']]['id']=$cvalue['id'];
            $object_categorys_array[$cvalue['id']]['category']=$cvalue['category'];
        }

        $object_types = (new Query())
            ->select(['id', 'type'])
            ->from('object_type')
            ->all();

        foreach ($object_types as $tkey=>$tvalue){
            $object_types_array[$tvalue['id']]['id']=$tvalue['id'];
            $object_types_array[$tvalue['id']]['type']=$tvalue['type'];
        }

        $object_districts = (new Query())
            ->select(['id', 'district'])
            ->from('object_district')
            ->all();

        foreach ($object_districts as $dkey=>$dvalue){
            $object_districts_array[$dvalue['id']]['id']=$dvalue['id'];
            $object_districts_array[$dvalue['id']]['district']=$dvalue['district'];
        }

        $object_citys = (new Query())
            ->select(['id', 'city'])
            ->from('object_city')
            ->all();

        foreach ($object_citys as $ckey=>$cvalue){
            $object_citys_array[$cvalue['id']]['id']=$cvalue['id'];
            $object_citys_array[$cvalue['id']]['city']=$cvalue['city'];
        }

        $searchModel = new ObjectSearch();
        $dataProvider = $searchModel->searchWithImage(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'object_categorys_array' => $object_categorys_array,
            'object_types_array' => $object_types_array,
            'object_districts_array' => $object_districts_array,
            'object_citys_array' => $object_citys_array,
        ]);

    }

    /**
     * Displays a single Object model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Object model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Object();
        $upload = new UploadForm();
        $object_images = new ObjectImages();

        //получаем дополнительные поля
        $options = ObjectOptions::find()->asArray()->all();

        $model->setAttribute('pubdate', time());
        //если пришел POST
        if (!empty($_POST['Object'])){
            p($_POST);
            exit;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()){
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
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'options' => $options,
                'model' => $model,
                'upload' => $upload
            ]);
        }
    }

    public function actionOptions(){
        return $this->render('options');
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'upload' => $upload,
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

    public function actionImageDelete($name)
    {
        $directory = \Yii::getAlias('@app/public_html/uploads/original') . DIRECTORY_SEPARATOR . Yii::$app->session->id;
        if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
        }
        $files = FileHelper::findFiles($directory);
        $output = [];
        foreach ($files as $file){
            $path = '/uploads/original/' . Yii::$app->session->id . DIRECTORY_SEPARATOR . basename($file);
            $output['files'][] = [
                'name' => basename($file),
                'size' => filesize($file),
                "url" => $path,
                "thumbnailUrl" => $path,
                "deleteUrl" => 'image-delete?name=' . basename($file),
                "deleteType" => "POST"
            ];
        }
        return Json::encode($output);
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
        if (($model = Object::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
