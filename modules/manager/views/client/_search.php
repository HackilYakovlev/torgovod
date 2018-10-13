<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GuestSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guest-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'secondname') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'nameeng') ?>

    <?php // echo $form->field($model, 'surnameeng') ?>

    <?php // echo $form->field($model, 'dayofbirth') ?>

    <?php // echo $form->field($model, 'monthofbirth') ?>

    <?php // echo $form->field($model, 'yearofbirth') ?>

    <?php // echo $form->field($model, 'residentcountryid') ?>

    <?php // echo $form->field($model, 'passportseries') ?>

    <?php // echo $form->field($model, 'workpositionid') ?>

    <?php // echo $form->field($model, 'regionfrom') ?>

    <?php // echo $form->field($model, 'createddate') ?>

    <?php // echo $form->field($model, 'statusid') ?>

    <?php // echo $form->field($model, 'sourceid') ?>

    <?php // echo $form->field($model, 'settled') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'dateofbirth') ?>

    <?php // echo $form->field($model, 'checkindate') ?>

    <?php // echo $form->field($model, 'checkoutdate') ?>

    <?php // echo $form->field($model, 'extra') ?>

    <?php // echo $form->field($model, 'placeofbirth') ?>

    <?php // echo $form->field($model, 'krestname') ?>

    <?php // echo $form->field($model, 'monahname') ?>

    <?php // echo $form->field($model, 'san') ?>

    <?php // echo $form->field($model, 'krestplace') ?>

    <?php // echo $form->field($model, 'krestyear') ?>

    <?php // echo $form->field($model, 'сommunion') ?>

    <?php // echo $form->field($model, 'churchyear') ?>

    <?php // echo $form->field($model, 'mychurch') ?>

    <?php // echo $form->field($model, 'maritalstatusid') ?>

    <?php // echo $form->field($model, 'disease') ?>

    <?php // echo $form->field($model, 'diseasedescription') ?>

    <?php // echo $form->field($model, 'residentialaddress') ?>

    <?php // echo $form->field($model, 'homephone') ?>

    <?php // echo $form->field($model, 'workphone') ?>

    <?php // echo $form->field($model, 'mobilephone') ?>

    <?php // echo $form->field($model, 'skype') ?>

    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'degree') ?>

    <?php // echo $form->field($model, 'institution') ?>

    <?php // echo $form->field($model, 'specialty') ?>

    <?php // echo $form->field($model, 'workplace') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'passportnumber') ?>

    <?php // echo $form->field($model, 'passportissued') ?>

    <?php // echo $form->field($model, 'dateofissue') ?>

    <?php // echo $form->field($model, 'expires') ?>

    <?php // echo $form->field($model, 'schengenvisa') ?>

    <?php // echo $form->field($model, 'shengencountry') ?>

    <?php // echo $form->field($model, 'visatermination') ?>

    <?php // echo $form->field($model, 'visacitydraw') ?>

    <?php // echo $form->field($model, 'goalpilgrimage') ?>

    <?php // echo $form->field($model, 'visitscount') ?>

    <?php // echo $form->field($model, 'lastvisit') ?>

    <?php // echo $form->field($model, 'birthsurname') ?>

    <?php // echo $form->field($model, 'nationality') ?>

    <?php // echo $form->field($model, 'citizenship') ?>

    <?php // echo $form->field($model, 'citizenshipnow') ?>

    <?php // echo $form->field($model, 'ukrainpassportnumber') ?>

    <?php // echo $form->field($model, 'wife') ?>

    <?php // echo $form->field($model, 'fiomaidenname') ?>

    <?php // echo $form->field($model, 'placeofbirthvisa') ?>

    <?php // echo $form->field($model, 'childrens') ?>

    <?php // echo $form->field($model, 'father') ?>

    <?php // echo $form->field($model, 'mother') ?>

    <?php // echo $form->field($model, 'parentsfio') ?>

    <?php // echo $form->field($model, 'etcvisa') ?>

    <?php // echo $form->field($model, 'previousstay') ?>

    <?php // echo $form->field($model, 'transitroute') ?>

    <?php // echo $form->field($model, 'modeoftransport') ?>

    <?php // echo $form->field($model, 'anketadate') ?>

    <?php // echo $form->field($model, 'qualityid') ?>

    <?php // echo $form->field($model, 'shengen') ?>

    <?php // echo $form->field($model, 'pgroup') ?>

    <?php // echo $form->field($model, 'pgroupcode') ?>

    <?php // echo $form->field($model, 'zagranend') ?>

    <?php // echo $form->field($model, 'countryresolution') ?>

    <?php // echo $form->field($model, 'typeofpassport') ?>

    <?php // echo $form->field($model, 'roomtype') ?>

    <?php // echo $form->field($model, 'sum') ?>

    <?php // echo $form->field($model, 'managerid') ?>

    <?php // echo $form->field($model, 'resolution') ?>

    <?php // echo $form->field($model, 'issueddiamonitirion') ?>

    <?php // echo $form->field($model, 'usersender') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'changed') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
