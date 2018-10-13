<?php

use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<h1>Мое портфолио</h1>

<?= $form->field($portfolio, 'title')->textInput()->label('Название работы') ?>

<?= $form->field($portfolio, 'description')->textarea(['rows'=>6]) ?>

<button class="btn btn-lg btn-success">Сохранить</button>

<?php ActiveForm::end(); ?>