<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjectOptionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Опции';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-options-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить опцию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'option_title',
            'is_checkbox',
            'is_dropdown',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
