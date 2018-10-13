<?php
use yii\widgets\LinkPager;
$this->title = 'Продажа квартир в Москве и Подмосковье';
$this->registerMetaTag(['name' => 'description', 'content' => 'Продажа квартир и комнат в Москве и Подмосковье']);
?>
<div class="body-content">
    <h1>Продажа квартир в Москве, Подмосковье и по всей России</h1>
    <div class="objects-list-cover">
        <?php

        foreach ($models as $model){
            echo '<div class="object-list-cover">';
            echo '<div class="object-list-image"><a href="/realty/object?num='.$model['id'].'"><img src="/uploads/small/'.$model['image'].'"></a></div>';
            echo '<div class="object-list-title"><a href="/realty/object?num='.$model['id'].'">'.$model['title'].'</a></div>';
            echo '<div class="object-list-description">'.$model['description'].'</div>';
            echo '</div>';
        }

        ?>
    </div>
</div>
<?php
echo LinkPager::widget([
'pagination' => $pages,
]);
?>