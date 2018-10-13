<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>Загрузите необходимое изображение</h1>

Загружаемые файлы должны быть в формате jpg и иметь разрешение не менее 800 пикселей по ширине и 800 пикселей по высоте

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($model, 'file')->fileInput() ?>

<?php echo Html::submitButton('Сохранить', ['class'=>'btn btn-lg btn-success']); ?>

<?php ActiveForm::end(); ?>