<?php
/*
 * YakCMS
 *
 */

namespace app\components;

use app\models\Category;
use kartik\sidenav\SideNav;
use yii\base\Component;

class CategoryNavigation extends Component
{
    public function display()
    {
        $category = new Category();
        $categories = Category::find()->orderBy(['depth'=>SORT_ASC, 'weight'=>SORT_DESC])->all();
        $categories_array = $category->dbResultToForest($categories);

        $type = 'SideNav::TYPE_DEFAULT';
        $heading = 'Каталог товаров';

        echo '<div class="sidenav absolute">';
        echo SideNav::widget([
            'type' => $type,
            'encodeLabels' => false,
            'heading' => $heading,
            'items' => $categories_array,
        ]);
        echo '</div>';
    }
}

?>