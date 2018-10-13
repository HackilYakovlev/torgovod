<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ObjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="object-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'objectcategoryid') ?>

    <?= $form->field($model, 'objecttypeid') ?>

    <?= $form->field($model, 'regionid') ?>

    <?= $form->field($model, 'cityid') ?>

    <?php // echo $form->field($model, 'districtid') ?>

    <?php // echo $form->field($model, 'metroid') ?>

    <?php // echo $form->field($model, 'operationtypeid') ?>

    <?php // echo $form->field($model, 'ownertypeid') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'pubdate') ?>

    <?php // echo $form->field($model, 'isowner') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
