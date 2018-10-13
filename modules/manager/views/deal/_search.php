<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DealSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'creatorid') ?>

    <?= $form->field($model, 'objectid') ?>

    <?= $form->field($model, 'objectemployees') ?>

    <?= $form->field($model, 'inquiryid') ?>

    <?php // echo $form->field($model, 'inquiryemployees') ?>

    <?php // echo $form->field($model, 'commission') ?>

    <?php // echo $form->field($model, 'transactionamount') ?>

    <?php // echo $form->field($model, 'pubdate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
