<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Guest */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="body-content">
    <h1>Клиенты</h1>

    <a class="btn btn-lg btn-success" href="/manager/client/create">Добавить клиента</a>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'email',
            [
                'attribute'=>'dateadded',
                //'contentOptions' =>['class' => 'table_class','style'=>'display:block;'],
                'content'=>function($data){
                    return date('d.m.Y H:i', $data->dateadded);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
