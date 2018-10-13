<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Inquiry */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inquiry-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'clientid')->dropDownList(ArrayHelper::map(\app\models\Client::find()->where('userid IN('.Yii::$app->user->id.')')->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'priorityid')->dropDownList(
        ArrayHelper::map(\app\models\InquiryPriority::find()->all(), 'id', 'priority'),
        [
            'options' => [
                2 => ['Selected'=>'selected']
            ]
        ]
    ) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'loyaltyid')->dropDownList(ArrayHelper::map(\app\models\InquiryLoyalty::find()->all(), 'id', 'loyalty')) ?>

    <?= $form->field($model, 'findedobjectid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
