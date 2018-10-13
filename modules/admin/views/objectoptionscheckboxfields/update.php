<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ObjectOptionsCheckboxFields */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Object Options Checkbox Fields',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Object Options Checkbox Fields'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="object-options-checkbox-fields-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
