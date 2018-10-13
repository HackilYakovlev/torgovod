<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ObjectOptions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="object-options-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'is_checkbox')->textInput() ?>

    <?= $form->field($model, 'is_dropdown')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
