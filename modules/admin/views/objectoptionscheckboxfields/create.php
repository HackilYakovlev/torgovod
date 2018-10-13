<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ObjectOptionsCheckboxFields */

$this->title = Yii::t('app', 'Create Object Options Checkbox Fields');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Object Options Checkbox Fields'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-options-checkbox-fields-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
