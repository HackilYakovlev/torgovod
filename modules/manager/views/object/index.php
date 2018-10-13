<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все объявления';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="object-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    (string) $message = '';
    $message = Yii::$app->session->getFlash(('message'));
        if (!empty($message)){
            echo '<div class="message">'.$message.'</div>';
        }
    ?>

    <?php
//    p($searchModel);
//    exit;
    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'image',
                'format' => 'raw',
                'value'=>function($model){
                    return '<img src="/uploads/small/'.$model->image.'">';
                },
                'label' => 'Изображение'
            ],
            [
                'attribute'=>'objectcategoryid',
                'format'=>'raw',
                'value'=>function($model){
                    return $model->object_category_array[$model->objectcategoryid];
                },
            ],
            'objecttypeid',
            'regionid',
            'cityid',
            // 'districtid',
            // 'metroid',
            // 'operationtypeid',
            // 'ownertypeid',
            // 'price',
            [
                'attribute' => 'pubdate',
                'value' => function($data){
                    return date('Y-m-d H:i:s', $data->pubdate);
                },
            ],
            [
                'format' => 'raw',
                'value' =>  function($data){
                    return '<a href="/manager/object/addobjectuserrelation?num=' . $data->id . '&ref=index">Добавить в работу</a>';
                },
            ],
            // 'isowner',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
