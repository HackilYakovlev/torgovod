<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'worktypeid')->textInput() ?>

    <?= $form->field($model, 'theme')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'deadline')->textInput() ?>

    <?= $form->field($model, 'language')->textInput() ?>

    <?= $form->field($model, 'pages_from')->textInput() ?>

    <?= $form->field($model, 'pages_to')->textInput() ?>

    <?= $form->field($model, 'zadanie')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'file')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'promocode')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
