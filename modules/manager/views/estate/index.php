<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Объекты';
$this->params['breadcrumbs'][] = $this->title;

use yii\bootstrap\Nav;
?>
<div class="body-content">
    <h1>Объекты</h1>
    <p>
        <?= Html::a('Добавить объект', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>В этом разделе находяться объекты, которые добавили вы или ваше агентство</p>
    <?php
    echo Nav::widget([
        'items' => [
            [
                'label' => 'Квартиры',
                'items' => [
                    ['label' => 'Все', 'url' => '#'],
                    ['label' => 'Продам', 'url' => '#'],
                    ['label' => 'Сдам', 'url' => '#'],
                    ['label' => 'Сдам посуточно', 'url' => '#'],
                ],
        ],
        [
            'label' => 'Дома',
            'items' => [
                ['label' => 'Все', 'url' => '#'],
                ['label' => 'Продам', 'url' => '#'],
                ['label' => 'Сдам', 'url' => '#'],
                ['label' => 'Сдам посуточно', 'url' => '#'],
            ],
        ],
            [
                'label' => 'Офисы',
                'items' => [
                    ['label' => 'Все', 'url' => '#'],
                    ['label' => 'Продам', 'url' => '#'],
                    ['label' => 'Сдам', 'url' => '#'],
                ],
            ],
            [
                'label' => 'Ком.недвижимость',
                'items' => [
                    ['label' => 'Все', 'url' => '#'],
                    ['label' => 'Продам', 'url' => '#'],
                    ['label' => 'Сдам', 'url' => '#'],
                ],
            ],
            [
                'label' => 'Земля',
                'items' => [
                    ['label' => 'Все', 'url' => '#'],
                    ['label' => 'Продам', 'url' => '#'],
                    ['label' => 'Сдам', 'url' => '#'],
                ],
            ],

    ],
    'options' => ['class' =>'nav-pills'], // set this to nav-tab to get tab-styled navigation
]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'image',
                'format' => 'raw',
                'value'=>function($data){
                    return '<img src="/uploads/small/'.$data->image.'">';
                },
                'label' => 'Изображение'
            ],
            'objectcategoryid',
            'objecttypeid',
            'regionid',
            'cityid',
            // 'districtid',
            // 'metroid',
            // 'operationtypeid',
            // 'ownertypeid',
            // 'pubdate',
            'isowner',
            'price',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
