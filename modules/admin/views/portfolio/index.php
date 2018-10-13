<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = Yii::t('app', 'My portfolio');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="userplace-default-index">
    <h1>Мое портфолио</h1>
    <a class="btn btn-lg btn-success" href="/admin/portfolio/new/">Добавить работу</a>
    <div class="portfolio-index">


        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'label'=>'Название работы',
                    'format'=>'raw',
                    'value' => function($data){
                        return Html::a($data->title,'view?id='.$data->id);
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{link}',
                    'buttons' => [
                        'link' => function ($url,$model,$key) {
                            $url =$url = Url::toRoute(['view', 'id' => (int)$model->id]);
                            return Html::a('<span class="btn-sm btn-success btn">Изображения</span>', [$url]
                            );
                        },
                    ],
                ],
                ['class' => 'yii\grid\ActionColumn'],

            ],
        ]); ?>

    </div>
</div>
