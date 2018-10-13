<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InquirySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inquiry-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'clientid') ?>

    <?= $form->field($model, 'priorityid') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'loyaltyid') ?>

    <?php // echo $form->field($model, 'findedobjectid') ?>

    <?php // echo $form->field($model, 'userid') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
