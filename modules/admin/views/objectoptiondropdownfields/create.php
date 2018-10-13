<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ObjectOptionsDropdownFields */

$this->title = Yii::t('app', 'Create Object Options Dropdown Fields');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Object Options Dropdown Fields'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-options-dropdown-fields-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
