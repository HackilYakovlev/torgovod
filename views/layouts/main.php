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
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name='yandex-verification' content='7bb4b10914df69be' />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript">
            (function (d, w, c) {
                (w[c] = w[c] || []).push(function() {
                    try {
                        w.yaCounter33391963 = new Ya.Metrika({
                            id:33391963,
                            clickmap:true,
                            trackLinks:true,
                            accurateTrackBounce:true
                        });
                    } catch(e) { }
                });

                var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () { n.parentNode.insertBefore(s, n); };
                s.type = "text/javascript";
                s.async = true;
                s.src = "https://mc.yandex.ru/metrika/watch.js";

                if (w.opera == "[object Opera]") {
                    d.addEventListener("DOMContentLoaded", f, false);
                } else { f(); }
            })(document, window, "yandex_metrika_callbacks");
        </script>

<!-- /Yandex.Metrika counter -->

        <!-- BEGIN JIVOSITE CODE {literal} -->
        <script type='text/javascript'>
            (function(){ var widget_id = 'SqUirzRgVA';var d=document;var w=window;function l(){
                var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
        <!-- {/literal} END JIVOSITE CODE -->

    </head>
    <body>

    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => 'Torgovod.ru',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Главная', 'url' => ['/site/index']],
                ['label' => 'Аренда', 'url' => ['/realty/rent']],
                ['label' => 'Продажа', 'url' => ['/realty/sale']],
                ['label' => 'Публикации', 'url' => ['/articles/index']],
                ['label' => 'Тарифы', 'url' => ['/prices/index']],
                ['label' => 'Контакты', 'url' => ['/contacts/index']],
                Yii::$app->user->isGuest ?
                    ['label' => 'Вход', 'url' => ['/site/login']] :
                    ['label' => 'Выход (' . Yii::$app->user->identity->email . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']],
                Yii::$app->user->isGuest ?['label' => 'Регистрация', 'url' => ['/site/registration']]:'',
            ],
        ]);

        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div><!--END container-->
    </div><!--END wrap-->

    <footer class="footer">
        <div class="container">            
            <p class="pull-left">
                Copyright &copy; <?= date('Y') ?>. Все права защищены Сделано в России <span style="color: #e74c3c;">❤</span> <a href="/database/index">База недвижимости</a>
            </p>
            <noscript>
                <div><img src="https://mc.yandex.ru/watch/33391963" style="position:absolute; left:-9999px;" alt="" /></div>
            </noscript>

        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    
    </html>
<?php $this->endPage() ?>
