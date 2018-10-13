<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ObjectOptions */

$this->title = Yii::t('app', 'Create Object Options');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Object Options'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-options-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
