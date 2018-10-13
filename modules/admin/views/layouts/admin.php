<?php
/**
 * YAK CMS
 *
 */
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
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?= $this->registerJsFile('/js/main.js'); ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div class="wrap">

    <?php
    NavBar::begin([
        'brandLabel' => 'Torgovod.ru',
        'brandUrl' => '/admin',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Объявления', 'items' => [
                ['label' => 'Объявления', 'url' => '/admin/object/index'],
                ['label' => 'Опции', 'url' => '/admin/objectoptions/index'],
                ['label' => 'Опции чекбоксы', 'url' => '/admin/objectoptionscheckboxfields/index'],
                ['label' => 'Опции выпадающие списки', 'url' => '/admin/objectoptiondropdownfields/index'],
            ]],
            ['label' => 'Заявки', 'url' => ['/admin/inquiry/index']],
            ['label' => 'Публикации', 'url' => ['/admin/articles/index']],
            ['label' => 'Отчеты', 'items' => [
                ['label' => 'Пользователи', 'url' => ['/admin/user/index']],
                ['label' => 'Финансы', 'url' => ['/admin/finance/index']],
                ['label' => 'Статистика', 'url' => ['/admin/statistic/index']],
            ]],
            ['label' => 'Системное', 'items' => [
                ['label' => 'Карта сайта', 'url' => '/admin/system/index'],
            ]],
            ['label' => 'Настройки', 'url' => ['/admin/settings/index']],
            ['label' => 'Выход', 'url' => ['/admin/login/logout']],
//            Yii::$app->user->isGuest ?
//                ['label' => 'Вход', 'url' => ['/site/login']] :
//                ['label' => 'Выход (' . Yii::$app->user->identity->email . ')',
//                    'url' => ['/admin/login/logout'],
//                    'linkOptions' => ['data-method' => 'post']],
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
