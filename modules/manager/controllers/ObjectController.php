<?php

namespace app\modules\manager\controllers;

use app\models\ObjectCategory;
use app\models\ObjectWorked;
use app\models\ObjectWorkedSearch;
use app\modules\manager\components\ManagerController;
use Yii;
use app\models\Object;
use app\models\ObjectSearch;
use yii\db\Query;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ObjectController implements the CRUD actions for Object model.
 */
class ObjectController extends ManagerController
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

    public function actionOwner()
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

        return $this->render('owner', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'object_categorys_array' => $object_categorys_array,
            'object_types_array' => $object_types_array,
            'object_districts_array' => $object_districts_array,
            'object_citys_array' => $object_citys_array,
        ]);
    }

    public function actionAddobjectuserrelation(){
        $num = (int)Yii::$app->request->get('num');

        $object = Object::find()->where(['id'=>$num])->one();

        $object_worked = new ObjectWorked();

        $id = $object->getAttribute('id');
        $title = $object->getAttribute('title');
        $description = $object->getAttribute('description');
        $objectcategoryid = $object->getAttribute('objectcategoryid');
        $objecttypeid = $object->getAttribute('objecttypeid');
        $regionid = $object->getAttribute('regionid');
        $cityid = $object->getAttribute('cityid');
        $districtid = $object->getAttribute('districtid');
        $metroid = $object->getAttribute('metroid');
        $operationtypeid = $object->getAttribute('operationtypeid');
        $ownertypeid = $object->getAttribute('ownertypeid');
        $price = $object->getAttribute('price');
        $pubdate = $object->getAttribute('pubdate');
        $isowner = $object->getAttribute('isowner');
        $usertype = $object->getAttribute('usertype');

        if (isset(Yii::$app->user->id)){
            $userid = Yii::$app->user->id;
        }
        else {
            $userid = 0;
        }

        $object_worked->setAttribute('title', $title);
        $object_worked->setAttribute('description', $description);
        $object_worked->setAttribute('objectcategoryid', $objectcategoryid);
        $object_worked->setAttribute('objecttypeid', $objecttypeid);
        $object_worked->setAttribute('regionid', $regionid);
        $object_worked->setAttribute('cityid', $cityid);
        $object_worked->setAttribute('districtid', $districtid);
        $object_worked->setAttribute('metroid', $metroid);
        $object_worked->setAttribute('operationtypeid', $operationtypeid);
        $object_worked->setAttribute('ownertypeid', $ownertypeid);
        $object_worked->setAttribute('price', $price);
        $object_worked->setAttribute('pubdate', $pubdate);
        $object_worked->setAttribute('isowner', $isowner);
        $object_worked->setAttribute('usertype', $usertype);
        $object_worked->setAttribute('userid', $userid);
        $object_worked->setAttribute('original_id', $id);

        $ref = Yii::$app->request->get('ref');

        if ($object_worked->validate()){
            if ($object_worked->save(false)){
                Yii::$app->session->setFlash('message', 'Объект успешно добавлен. Теперь он доступен в разделе <a href="/manager/object/index">объекты</a>.    ');
                switch ($ref){
                    case 'owner':
                        $this->redirect('/manager/object/owner');
                    break;
                    case 'index':
                        $this->redirect('/manager/object/index');
                    break;
                }
            }
            else{
                //p($object_worked->getErrors());
            }
        }
        else {
            //p($object_worked->getErrors());
        }

        return $this->render('addobjectuserrelation');
    }

    public function actionObjectuserrelation(){
        $status = Yii::$app->request->get('status');
        return $this->render('objectuserrelation', [
            'status' => $status
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
        $model = new ObjectWorked();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
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
        if (($model = ObjectWorked::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
