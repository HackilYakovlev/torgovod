<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Object */

$this->title = Yii::t('app', 'Редактирование объекта: ', [
    'modelClass' => 'Object',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Objects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="object-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload' => $upload,
    ]) ?>

</div>
