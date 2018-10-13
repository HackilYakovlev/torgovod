<?php
use yii\helpers\Html;

$this->title = 'Панель управления';
$this->params['breadcrumbs'][] = $this->title;

use yii\bootstrap\Nav;
?>
<div class="body-content">
    <h1>Панель управления</h1>
    <div class="bs-docs">
        <h2>Оплата</h2>
        <p>
            Ваш тарифный план: <?=$tariff_rows['name']?>
        </p>
        <p>На вашем счету:
            <?php
            if ($bill_rows['summ']>0){
                echo $bill_rows['summ'];
            }
            else{
                echo 0;
            }
            ?>
            руб.</p>
        <p>

        </p>
        <p>
            Заплатить за: 1 месяц
        </p>
        <p>
            <?
            $mrh_login = "torgovodru";
            $mrh_pass1 = "Y6Wfec1H2vlOLXlfe0C4";
            $inv_id = 0;
            $inv_desc = "Оплата тарифного плана torgovod.ru на 1 месяц";
            $def_sum = $tariff_rows['price'];
            $crc = md5("$mrh_login::$inv_id:$mrh_pass1");
            $culture = "RU";
            print "<html><script language=JavaScript ".
                "src='https://auth.robokassa.ru/Merchant/PaymentForm/FormFLS.js?".
                "MerchantLogin=$mrh_login&DefaultSum=$def_sum&InvoiceID=$inv_id".
                "&Description=$inv_desc&SignatureValue=$crc&culture=$culture'></script></html>";
            ?>
        </p>

        <p>
            <?
            $tariff_total_summ = $tariff_rows['price'] * 12;
            $sale_percent = 30;
            $discount_summ = ($tariff_total_summ * $sale_percent) / 100;
            $summ_with_sale_discount = $tariff_total_summ - $discount_summ;
            $mrh_login = "torgovodru";
            $mrh_pass1 = "Y6Wfec1H2vlOLXlfe0C4";
            $inv_id = 0;
            $inv_desc = "Оплата тарифного плана torgovod.ru на 1 год";
            $def_sum = $summ_with_sale_discount;
            $crc = md5("$mrh_login::$inv_id:$mrh_pass1");
            $culture = "RU";
            ?>
        <p>
            Заплатить за: 12 месяцев<br>
            Вы экономите <?=$discount_summ?> рублей (30%)
        </p>
        <?
        print "<html><script language=JavaScript ".
            "src='https://auth.robokassa.ru/Merchant/PaymentForm/FormFLS.js?".
            "MerchantLogin=$mrh_login&DefaultSum=$def_sum&InvoiceID=$inv_id".
            "&Description=$inv_desc&SignatureValue=$crc&culture=$culture'></script></html>";
        ?>
        </p>
    </div>
    <div class="bs-docs">
        <h2>Объекты</h2>
        <p>Объектов в работе: 0</p>
        <p><a href="/manager/estate/index/">Перейти к списку объектов</a></p>
    </div>
    <div class="bs-docs">
        <h2>Заявки</h2>
        <p>Незакрытые заявки: 0</p>
        <p><a href="/manager/inquiry/index/">Перейти к списку заявок</a></p>
    </div>

</div>
