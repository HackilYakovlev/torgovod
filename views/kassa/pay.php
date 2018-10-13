<?php
$this->title = 'Оплата';
$this->registerMetaTag(['name' => 'description', 'content' => 'Оплата на torgovod.ru']);
?>
<div class="body-content">
    <h1>Оплата выбранного тарифа</h1>
    <p>После нажатия кнопки "Перейти к оплате" вы будете направлены на сайт Яндекс для оплаты</p>
<!-- Значения всех полей условны и приведены исключительно для примера -->
<form action="https://money.yandex.ru/eshop.xml" method="post">

    <!-- Обязательные поля -->
    <input name="shopId" value="1234" type="hidden"/>
    <input name="scid" value="4321" type="hidden"/>
    <input name="sum" value="100.50" type="hidden">
    <input name="customerNumber" value="abc000" type="hidden"/>

    <!-- Необязательные поля -->
    <input name="shopArticleId" value="567890" type="hidden"/>
    <input name="paymentType" value="AC" type="hidden"/>
    <input name="orderNumber" value="abc1111111" type="hidden"/>
    <input name="cps_phone" value="79110000000" type="hidden"/>
    <input name="cps_email" value="user@domain.com" type="hidden"/>

    <input type="submit" value="Перейти к оплате"/>
</form>

</div>