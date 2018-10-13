<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Объявления / Собственники';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    (string) $message = '';
    $message = Yii::$app->session->getFlash(('message'));
    if (!empty($message)){
        echo '<div class="message">'.$message.'</div>';
    }
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function($data){
                    return '<img src="/uploads/small/'.$data->image.'">';
                }
            ],
            [
                'attribute' => 'objectcategoryid',
                'format' => 'raw',
                'value' => function($data) use ($object_categorys_array){
                    return $object_categorys_array[$data->objectcategoryid]['category'];
                }
            ],
            [
                'attribute' => 'objecttypeid',
                'format' => 'raw',
                'value' => function($data) use ($object_types_array){
                    return $object_types_array[$data->objecttypeid]['type'];
                }
            ],
            [
                'attribute' => 'districtid',
                'format' => 'raw',
                'value' => function($data) use ($object_districts_array){
                    return $object_districts_array[$data->objecttypeid]['district'];
                }
            ],
            [
                'attribute' => 'cityid',
                'format' => 'raw',
                'value' => function($data) use ($object_citys_array){
                    return $object_citys_array[$data->objecttypeid]['city'];
                }
            ],
            [
                'attribute' => 'isowner',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->isowner==1?'Да':'Нет';
                }
            ],
            'price',
            ['attribute'=>'pubdate',
                'format'=>'raw',
                'value' => function($data){
                    return date('Y-m-d H:i:s', $data->pubdate);
                },
            ],
            [
                'format' => 'raw',
                'value' =>  function($data){
                    return '<a href="/manager/object/addobjectuserrelation?num=' . $data->id . '&ref=owner">Добавить в работу</a>';
                },
            ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
        ],
    ]); ?>

</div>
