<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Torgovod.ru',
        'brandUrl' => '/manager/',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Объявления',  'items' => [
                ['label' => 'Собственники', 'url' => ['/manager/object/owner']],
                ['label' => 'Все объявления', 'url' => ['/manager/object/index']],
            ]],
            ['label' => 'Клиенты', 'url' => ['/manager/client/index']],
            ['label' => 'Объекты', 'url' => ['/manager/estate/index']],
            //['label' => 'Подборы', 'url' => ['/manager/pick/index']],
            //['label' => 'Поиск', 'url' => ['/manager/search/index']],
//            ['label' => 'Заявки',  'items' => [
//                //['label' => 'Мои заявки', 'url' => ['/manager/inquiry/index']],
//                //['label' => 'Все заявки', 'url' => ['/manager/inquiry/all']],
//            ]],
            ['label' => 'Заявки', 'url' => ['/manager/inquiry/index']],
            //['label' => 'Встречи', 'url' => ['/manager/meeting/index']],
            //['label' => 'Сделки', 'url' => ['/manager/deal/index']],
            //['label' => 'Задачи', 'url' => ['/manager/task/index']],
            //['label' => 'Календарь', 'url' => ['/manager/calendar/index']],
            //['label' => 'Статистика', 'url' => ['/manager/report/index']],
            ['label' => 'Инструменты', 'items' => [
                ['label' => 'Рекламные площадки', 'url' => ['/manager/tool/advertising']],
                ['label' => 'Публикация объектов', 'url' => ['/manager/tool/export']],
                ]],
            ['label' => 'Настройки', 'url' => ['/manager/setting/index']],
            ['label' => 'Поддержка', 'url' => ['/manager/help/index']],
            ['label' => 'Оплата', 'url' => ['/manager/payment/index']],
            Yii::$app->user->isGuest ?
                ['label' => 'Вход', 'url' => ['/site/login']] :
                ['label' => 'Выход',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']],
            Yii::$app->user->isGuest ?
                ['label' => 'Регистрация', 'url' => ['/site/registration']]:'',
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Torgovod.ru <?= date('Y') ?></p>


    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
