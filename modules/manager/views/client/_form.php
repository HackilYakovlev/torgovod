<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Guest */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>

<?= $form->field($model, 'typeid')->dropDownList(
    [1=>'Не знаю', 2=>'Частное лицо', 3=>'Риэлтор', 4=>'Агентство недвижимости', 5=>'Банк', 6=>'Застройщик', 7=>'Другое']

);?>

<?= $form->field($model, 'name') ?>

<?= $form->field($model, 'email') ?>

<?= $form->field($model, 'url') ?>

<?= $form->field($model, 'address') ?>

<?= $form->field($model, 'extinfo')->textarea(['cols'=>5, 'rows'=>5]) ?>

<?= $form->field($model, 'statusid')->dropDownList(
    [
        0=>'',
        1=>'VIP клиент',
        2=>'Текущий клиент',
        3=>'Агентство (1000 рублей в месяц)',
        4=>'Лид (желание сотрудничать)',
        5=>'Лид (заинтересованность)',
        6=>'Лид (осведомленность)',
        7=>'Постоянный клиент',
        8=>'Специальный клиент',
        9=>'Недобросовестный',
        10=>'Мошенник',
    ]

);?>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>
