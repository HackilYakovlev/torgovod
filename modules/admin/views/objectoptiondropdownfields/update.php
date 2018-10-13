<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ObjectOptionsDropdownFields */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Object Options Dropdown Fields',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Object Options Dropdown Fields'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="object-options-dropdown-fields-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
