<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\ObjectCategory;
use app\models\ObjectType;
use app\models\ObjectOperationType;
use app\models\ObjectDistrict;
use app\models\ObjectCity;
use app\models\ObjectMetro;
use dosamigos\fileupload\FileUploadUI;
/* @var $this yii\web\View */
/* @var $model app\models\Object */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="object-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'objectcategoryid')->dropDownList(
        ArrayHelper::map(ObjectCategory::find()->all(), 'id', 'category'),
        [
            'prompt'=>'-Выберите категорию-',
            'onchange' => '
                $.post( "'.Yii::$app->urlManager->createUrl('admin/object/objecttypelists?objectcategoryid=').'"+$(this).val(), function( data ) {
                  $( "select#object-objecttypeid" ).html( data );
                });
            '
        ]) ?>

    <?= $form->field($model, 'objecttypeid')->dropDownList(['1'=>'----'], ['prompt'=>'-Выберите категорию-']) ?>

    <?= $form->field($model, 'operationtypeid')->dropDownList(ArrayHelper::map(ObjectOperationType::find()->all(), 'id', 'operation')) ?>

    <?= $form->field($model, 'isowner')->dropDownList([
        1=>'Да',
        2=>'Нет',
    ]) ?>

    <?= $form->field($model, 'districtid')->dropDownList(ArrayHelper::map(ObjectDistrict::find()->all(), 'id', 'district')) ?>

    <?= $form->field($model, 'cityid')->dropDownList(ArrayHelper::map(ObjectCity::find()->all(), 'id', 'city')) ?>

    <?= $form->field($model, 'metroid')->dropDownList(ArrayHelper::map(ObjectMetro::find()->all(), 'id', 'metro')) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <!--    --><?//= //$form->field($upload, 'file[]')->fileInput(['multiple' => true]) ?>

    <?= FileUploadUI::widget([
        'model' => $upload,
        'attribute' => 'file',
        'url' => ['/admin/images/upload'],
        'gallery' => false,
        'fieldOptions' => [
            'accept' => 'image/*'
        ],
        'clientOptions' => [
            'maxFileSize' => 2000000
        ],
        // ...
        'clientEvents' => [
            'fileuploaddone' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
            'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
        ],
    ]);
    ?>

    <div id="options">

        <?php

        foreach ($options as $key=>$option){

            if ($option['is_checkbox'] == 1){
                $checkboxes = \app\models\ObjectOptionsCheckboxFields::find()
                    ->asArray()
                    ->where('optionid IN ('.$option['id'].')')
                    ->all();

                echo '<div class="form-group field-object-checkbox">';
                echo '<label class="control-label" for="object-checkbox">'.$option['option_title'].'</label>';

                foreach ($checkboxes as $checkbox_key=>$checkbox){
                    echo '<div>';
                    echo '<input type="checkbox" id="object-metroid" name="Object[checkbox][optionid]['.$option['id'].']['.$checkbox['id'].']" value='.$checkbox['value'].'></td>'.$checkbox['value'];
                    echo '</div>';
                }

                echo '<div class="help-block"></div>';
                echo '</div>';
            }
            elseif ($option['is_dropdown'] == 1){
                $dropdowns = \app\models\ObjectOptionsDropdownFields::find()
                    ->asArray()
                    ->where('optionid IN ('.$option['id'].')')
                    ->all();

                echo '<div class="form-group field-object-checkbox">';
                echo '<label class="control-label" for="object-checkbox">'.$option['option_title'].'</label>';

                echo '<select name="Object[dropdown][optionid]['.$option['id'].']">';
                foreach ($dropdowns as $dropdown_key=>$dropdown){
                    echo '<div>';
                    echo '<option name="Object[dropdown]['.$dropdown['id'].']" value='.$dropdown['value'].'></td>'.$dropdown['value'];
                    echo '</div>';
                }
                echo '</select>';

            }
        }

        ?>

    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Добавить' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
