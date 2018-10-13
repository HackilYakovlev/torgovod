<?php

/* @var $this yii\web\View */
$this->title = $article->title;
$this->registerMetaTag(['name' => 'description', 'content' => $article->description]);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'CRM, риэлтор, недвижимость, продажи, бесплатно']);
?>
<div class="site-index">

    <div class="body-content">

        <h1><?= $article->title; ?></h1>
        <h2><?= $article->description; ?></h2>

        <div class="content">
            <script type="text/javascript">(function() {
                    if (window.pluso)if (typeof window.pluso.start == "function") return;
                    if (window.ifpluso==undefined) { window.ifpluso = 1;
                        var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                        s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                        s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                        var h=d[g]('body')[0];
                        h.appendChild(s);
                    }})();</script>
            <div class="pluso" data-background="transparent" data-options="medium,round,line,horizontal,counter,theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,print"></div>
            <?php

            echo $article->body;

            ?>
            <script type="text/javascript">(function() {
                    if (window.pluso)if (typeof window.pluso.start == "function") return;
                    if (window.ifpluso==undefined) { window.ifpluso = 1;
                        var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                        s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                        s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                        var h=d[g]('body')[0];
                        h.appendChild(s);
                    }})();</script>
            <div class="pluso" data-background="transparent" data-options="medium,round,line,horizontal,counter,theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,print"></div>
        </div>

    </div>

</div>



