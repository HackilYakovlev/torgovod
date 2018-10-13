<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'worktypeid') ?>

    <?= $form->field($model, 'theme') ?>

    <?= $form->field($model, 'subject') ?>

    <?= $form->field($model, 'deadline') ?>

    <?php // echo $form->field($model, 'language') ?>

    <?php // echo $form->field($model, 'pages_from') ?>

    <?php // echo $form->field($model, 'pages_to') ?>

    <?php // echo $form->field($model, 'zadanie') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'promocode') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'agreement') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
