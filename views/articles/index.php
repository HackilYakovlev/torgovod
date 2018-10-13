<?php

/* @var $this yii\web\View */
$this->title = 'Публикации Торговод. Новости недвижимости, аналитика';
$this->registerMetaTag(['name' => 'description', 'content' => 'Публикации Торговод. Новости недвижимости, аналитика.']);
$this->registerMetaTag(['name' => 'keywords', 'content' => 'CRM, риэлтор, недвижимость, продажи, бесплатно']);
?>
<div class="site-index">

    <div class="body-content">

        <h1>Публикации</h1>
        <ul>
        <?php

        foreach ($articles_list as $article){
            echo '<li><a href="/articles/article?num='.$article->id.'">'.$article->title.'</a></li>';
        }

        ?>
        </ul>
    </div>

</div>



