<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Deal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'objectid')->textInput() ?>

    <?= $form->field($model, 'objectemployees')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'inquiryid')->textInput() ?>

    <?= $form->field($model, 'inquiryemployees')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'commission')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'transactionamount')->textInput() ?>

    <?= $form->field($model, 'pubdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
