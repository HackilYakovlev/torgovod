<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Объявления';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="object-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить объявление', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'image',
                'label' => 'Изображение',
                'format' => 'raw',
                'value'=>function($data){
                    return '<img src="/uploads/small/'.$data->image.'">';
                },
            ],
            'title',
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
            // 'districtid',
            // 'metroid',
            // 'operationtypeid',
            // 'ownertypeid',
            // 'price',
            // 'pubdate',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
