<?php
$this->title = 'Аренда квартир в Москве и Подмосковье';
$this->registerMetaTag(['name' => 'description', 'content' => 'Аренда квартир и комнат в Москве и Подмосковье']);
?>
<div class="body-content">
    <h1>Аренда квартир в Москве, Подмосковье и по всей России</h1>

    <?php
    foreach ($models as $model){
        echo $model->title;
    }

    ?>

</div>