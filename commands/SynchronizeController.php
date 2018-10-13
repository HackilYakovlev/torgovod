<?php

namespace app\commands;

use app\models\Portfolio;
use yii\console\Controller;
use yii\helpers\ArrayHelper;
use app\models\PortfolioImages;

class SynchronizeController extends Controller
{    
    //private $_handle='http://sjob.com.ua';
    private $_handle='http://sjob';

    public function actionIndex()
    {
    	$this->GetNewPortfolio();
    }

    public function GetNewPortfolio()
    {
        $response = 0;
        //запрашиваем свежие портфолио с ресурса
    	if ($json_data = file_get_contents($this->_handle.'/api/output/getnewportfolio')){
            $results = json_decode($json_data);
            $results = ArrayHelper::toArray($results);
            
            if (count($results)>0){
                foreach ($results as $result) {
                    $portfolio = new Portfolio();
                    //проверяем есть ли дубликаты в таблице портфолио
                    //если нет, делаем новую запись, если есть делаем update
                    $count = Portfolio::find()->filterWhere(['realid' => $result['id']])->count('*');
                    if ($count<1) {
                        $portfolio->isNewRecord = true;
                        $portfolio->setAttribute('source', 1);
                        $portfolio->setAttribute('realid', $result['id']);
                        $portfolio->setAttribute('title', $result['title']);
                        $portfolio->setAttribute('description', $result['description']);
                        $portfolio->setAttribute('pubdate', $result['pubdate']);
                        $portfolio->setAttribute('userid', $result['userid']);
                        $portfolio->setAttribute('isshow', $result['isshow']);
                        $portfolio->setAttribute('synchronized', 1);
                        $portfolio->setAttribute('publish', $result['publish']);
                        if ($portfolio->validate()) {
                            if ($portfolio->save()) {
                                echo $response = (int)file_get_contents($this->_handle . '/api/input/updateportfoliostatus?portfolioid=' . $result['id']);
                                if ($response == 0) {
                                    $porfolio->id->delete();
                                } else {
                                    echo "Synchronized" . $result['id'] . "\r\n";
                                }
                            }
                        }
                        
                        //забираем с ресурса новые изображения
                        $json_images = file_get_contents($this->_handle.'/api/output/getnewportfolioimages');
                        $images_results = json_decode($json_images);
                        $images_results = ArrayHelper::toArray($images_results);

                        if (count($images_results)>0){
                            foreach ($images_results as $images_result){
                                 //инициализируем новый объект изображений портфолио
                                 $portfolio_images = new PortfolioImages();
                                 $portfolio_images->isNewRecord = true;
                                 $portfolio_images->setAttributes();
                            }
                        }

                    }
                }
            }
            
        }
    }
}