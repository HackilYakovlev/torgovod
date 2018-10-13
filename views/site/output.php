

<?php
use yii\widgets\LinkPager;

echo '<table>';
foreach ($ips as $out){
    echo '</tr>';
    echo '<td>'.$out['id'].'</td>'.'<td>&nbsp;</td>'.'<td>'.$out['ip'].'</td>';
    echo '</tr>';
}
echo '</table>';

echo LinkPager::widget([
    'pagination' => $pages,
]);