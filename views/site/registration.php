<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-registration">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'secondname') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'tariff')->dropDownList(
        [1=>'Базовый (400 рублей в месяц)', 2=>'Агент (800 рублей в месяц)', 3=>'Агентство (2000 рублей в месяц)'],
        ['options' =>
            [
                $tariff => ['Selected' => 'selected']
            ]
        ]

    //['prompt'=>'']
    );?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <!--<p><b>3 дня бесплатно</b></p>-->
        </div>
    </div>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>