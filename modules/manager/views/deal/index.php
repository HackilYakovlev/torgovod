<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Nav;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DealSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сделки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deal-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить сделку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    echo Nav::widget([
        'items' => [
            [
                'label' => 'В процессе',
                'items' => [
                    ['label' => 'Все', 'url' => '/manager/deal/index?status=deposit'],
                    ['label' => 'Продажа', 'url' => '/manager/deal?status=all'],
                    ['label' => 'Аренда', 'url' => '#'],
                    ['label' => 'Аренда посуточно', 'url' => '#'],
                ],
            ],
            [
                'label' => 'Успешные',
                'items' => [
                    ['label' => 'Все', 'url' => '/manager/deal/index?status=compelete'],
                    ['label' => 'Продажа', 'url' => '#'],
                    ['label' => 'Аренда', 'url' => '#'],
                    ['label' => 'Аренда посуточно', 'url' => '#'],
                ],
            ],
            [
                'label' => 'Отменены',
                'items' => [
                    ['label' => 'Все', 'url' => '/manager/deal/index?status=compelete'],
                    ['label' => 'Продажа', 'url' => '#'],
                    ['label' => 'Аренда', 'url' => '#'],
                    ['label' => 'Аренда посуточно', 'url' => '#'],
                ],
            ]
        ],
        'options' => ['class' =>'nav-pills'], // set this to nav-tab to get tab-styled navigation
    ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'creatorid',
            'objectid',
            'objectemployees:ntext',
            'inquiryid',
            'inquiryemployees:ntext',
            'commission',
            'transactionamount',
            'pubdate',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
