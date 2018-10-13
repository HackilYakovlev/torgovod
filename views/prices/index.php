<?php
$this->title = 'Тарифы';
$this->registerMetaTag(['name' => 'description', 'content' => 'Тарифные планы на подключение к системе Torgovod']);
?>
<div class="body-content">
<h1>Тарифы</h1>

    <table class="table table-striped table-bordered">
        <tbody>
        <tr>
            <td>Тарифы</td><td>Базовый</td><td>Агент</td><td>Агентство</td>
        </tr>
        <tr>
            <td>Стоимость</td><td>400 руб. в месяц</td><td>800 руб. в месяц</td><td>2000 руб. в месяц</td>
        </tr>
        <tr>
            <td>Количество пользователей</td><td>1</td><td>1</td><td>Неограниченно</td>
        </tr>
        <tr>
            <td>Эксклюзивные объекты</td><td>0 (каждый платно — 50 руб.)</td><td>Неограниченно</td><td>Неограниченно</td>
        </tr>
        <tr>
            <td>Количество заявок собственников</td><td>0 (каждая платно — 50 руб.)</td><td>Неограниченно</td><td>Неограниченно</td>
        </tr>
        <tr>
            <td>Количество объектов в рекламу</td><td>5</td><td>50</td><td>Неограниченно</td>
        </tr>
        <tr>
            <td>Выгрузка рекламы на порталы</td><td>30</td><td>30+80 платных</td><td>30+80 платных</td>
        </tr>
        <tr>
            <td>Статистика</td><td>Нет</td><td>Есть</td><td>Есть</td>
        </tr>
        <tr>
            <td>Аналитика</td><td>Нет</td><td>Есть</td><td>Есть</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><a class="btn btn-lg btn-success" href="/site/registration?tariff=1">Регистрация</a></td>
            <td><a class="btn btn-lg btn-success" href="/site/registration?tariff=2">Регистрация</a></td>
            <td><a class="btn btn-lg btn-success" href="/site/registration?tariff=3">Регистрация</a></td>
        </tr>
        </tbody>
    </table>
   </div>