<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

$this->title = Yii::t('app', 'My portfolio');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="userplace-default-index">
    <h1>Детали вашей работы и изображения</h1>
    <table class="table table-striped table-bordered">
        <tr>
            <td>Название работы</td><td><?= $portfolio_obj->title ?></td>
        </tr>
        <tr>
            <td>Описание работы</td><td><?= $portfolio_obj->description ?></td>
        </tr>          
        <tr>
            <td>Действия</td><td><a href="/admin/portfolio/update?id=<?= $portfolionum ?>">Редактировать</a></td>
        </tr>
    </table>
    <p>Изображения к вашей работе</p>
    <a class="btn btn-lg btn-success" href="/admin/portfolio/newimage?portfolio=<?= $portfolionum ?>">Добавить изображение</a>
    <div class="portfolio-index">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'label'=>'Изображение',
                    'format'=>'raw',
                    'value' => function($data){
                        return '<a href="updateimage?image='.$data->id.'"><img src="/uploads/small/'.$data->image.'"></a>';
                    }
                ],
                [
                    'class' => \yii\grid\ActionColumn::className(),
                    'buttons'=>[
                        'update'=>function ($url, $model) {
                            $customurl=Yii::$app->getUrlManager()->createUrl(['admin/portfolio/updateimage','image'=>$model['id']]); //$model->id для AR
                            return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-pencil"></span>', $customurl,
                                ['title' => Yii::t('yii', 'Update'), 'data-pjax' => '0']);
                        },
                        'delete'=>function ($url, $model) {
                            $customurl=Yii::$app->getUrlManager()->createUrl(['admin/portfolio/deleteimage','image'=>$model['id']]); //$model->id для AR
                            return \yii\helpers\Html::a( '<span class="glyphicon glyphicon-trash"></span>', $customurl,
                                ['title' => Yii::t('yii', 'Delete'),
                                    'data-confirm'=>'Вы уверены, что хотите удалить это изображение?',
                                    'data-pjax' => '0']);
                        }
                    ],
                    'template'=>'{update} {delete}',
                ]

            ],
        ]); ?>

    </div>
    </div>