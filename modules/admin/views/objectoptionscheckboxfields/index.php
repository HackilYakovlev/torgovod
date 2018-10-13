<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjectOptionsCheckboxFieldsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Чекбоксы опций';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-options-checkbox-fields-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить чекбокс опции', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'optionid',
            'value',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
