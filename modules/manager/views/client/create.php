<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Guest */

$this->title = 'Добавить клиента';
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="body-content">
    <h1>Добавить клиента</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
