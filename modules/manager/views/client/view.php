<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Guest */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Guests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'secondname',
            'surname',
            'nameeng',
            'surnameeng',
            'dayofbirth',
            'monthofbirth',
            'yearofbirth',
            'residentcountryid',
            'passportseries',
            'workpositionid',
            'regionfrom',
            'createddate',
            'statusid',
            'sourceid',
            'settled',
            'email:email',
            'dateofbirth',
            'checkindate',
            'checkoutdate',
            'extra:ntext',
            'placeofbirth',
            'krestname',
            'monahname',
            'san',
            'krestplace',
            'krestyear',
            'сommunion',
            'churchyear',
            'mychurch',
            'maritalstatusid',
            'disease',
            'diseasedescription',
            'residentialaddress',
            'homephone',
            'workphone',
            'mobilephone',
            'skype',
            'education',
            'degree',
            'institution',
            'specialty',
            'workplace',
            'position',
            'passportnumber',
            'passportissued',
            'dateofissue',
            'expires',
            'schengenvisa',
            'shengencountry',
            'visatermination',
            'visacitydraw',
            'goalpilgrimage:ntext',
            'visitscount',
            'lastvisit',
            'birthsurname',
            'nationality',
            'citizenship',
            'citizenshipnow',
            'ukrainpassportnumber',
            'wife',
            'fiomaidenname',
            'placeofbirthvisa',
            'childrens',
            'father',
            'mother',
            'parentsfio',
            'etcvisa',
            'previousstay',
            'transitroute',
            'modeoftransport',
            'anketadate',
            'qualityid',
            'shengen',
            'pgroup',
            'pgroupcode',
            'zagranend',
            'countryresolution',
            'typeofpassport',
            'roomtype',
            'sum',
            'managerid',
            'resolution',
            'issueddiamonitirion',
            'usersender',
            'photo',
            'changed',
        ],
    ]) ?>

</div>
