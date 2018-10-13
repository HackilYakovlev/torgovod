<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Добавление объекта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        if ($status="success"){
            echo 'Объект успешно добавлен в список ваших объектов ';
            echo '<a href="/manager/estate/index">Перейти к моим объектам</a><br>';
            echo '<a href="/manager/object/index">Вернуться к списку объявлений</a>';
        }
        ?>

</div>
