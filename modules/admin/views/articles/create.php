<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Articles */

$this->title = Yii::t('app', 'Добавить публикацию');
$this->params['breadcrumbs'][] = ['label' => 'Публикации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
