<?php
/**
 * YakCMS
 */

namespace app\components;
use app\models\Category;
use app\models\Product;
use yii\web\UrlRule;

class ProductUrlRule extends UrlRule
{

    public function init(){

    }

    public function parseRequest($manager, $request)
    {
        $slug = $request->getPathInfo();

        if (!$slug) {
            return false;
        }

        if (strpos($slug, "/")){
            return false;
        }

        preg_match('/^([a-z])([1-9]{1,})_(.*)/', $slug, $matches);

        if (!empty($matches[1]) && !empty($matches[2]))
        {
            switch ($matches[1])
            {

                #Category
                case 'c':
                    $count = Category::find()
                        ->andFilterWhere(['id' => (int)$matches[2]])
                        ->count('*');
                    if ($count>0){
                        $data = ['categoryid'=>(int)$matches[2]];
                        return ['/category/index', $data];
                    }
                break;

                #Product
                case 'p':
                    $count = Product::find()
                        ->andFilterWhere(['id' => (int)$matches[2]])
                        ->count('*');
                    if ($count>0){
                        $data = ['productid'=>(int)$matches[2]];
                        return ['/product/index', $data];
                    }
                break;

            }
        }
        else {
            return false;
        }

//        $queryBuilder = (new \frontend\components\ElasticQueryBuilder())
//            ->setIndex('indexName')
//            ->setType('indexType')
//            ->setQueryStringQuery('slug', $slug, 'and');
//
//        $loader = (new \frontend\components\DataLoader($queryBuilder))->load();
//
//        if ($loader->getTotal() === 0) {
//            return false;
//        }

        return [$this->route, ['slug' => $slug]];
    }
}