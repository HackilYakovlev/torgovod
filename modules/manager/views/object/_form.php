<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Object */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="object-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'objectcategoryid')->textInput() ?>

    <?= $form->field($model, 'objecttypeid')->textInput() ?>

    <?= $form->field($model, 'regionid')->textInput() ?>

    <?= $form->field($model, 'cityid')->textInput() ?>

    <?= $form->field($model, 'districtid')->textInput() ?>

    <?= $form->field($model, 'metroid')->textInput() ?>

    <?= $form->field($model, 'operationtypeid')->textInput() ?>

    <?= $form->field($model, 'ownertypeid')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'pubdate')->textInput() ?>

    <?= $form->field($model, 'isowner')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
