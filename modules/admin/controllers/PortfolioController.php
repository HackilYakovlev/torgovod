<?php
namespace app\modules\admin\controllers;

use app\models\Portfolio;
use app\modules\admin\components\AdminController;
use Yii;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\imagine\Image;
use app\models\PortfolioImages;
use app\models\PortfolioSearch;
use app\models\PortfolioImagesSearch;
use yii\web\Controller;
use yii\base\Exception;
use app\models\PorftolioImages;

class PortfolioController extends AdminController
{
    public function actionIndex()
    {
        $searchModel = new PortfolioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('userid='.(int)Yii::$app->user->id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionNew()
    {
        $portfolio = new Portfolio();
        if (Yii::$app->request->isPost)
        {
            $portfolio->setAttribute('title', $_POST['Portfolio']['title']);
            $portfolio->setAttribute('description', $_POST['Portfolio']['description']);
            $portfolio->setAttribute('userid', Yii::$app->user->id);
            $portfolio->setAttribute('realid', 0);
            $portfolio->setAttribute('source', 0);
            $portfolio->setAttribute('pubdate', time());

            if ($portfolio->validate()){
                if ($portfolio->save(false)){
                    $portfolioid = $portfolio->id;
                    $this->redirect('/admin/portfolio/view?id='.$portfolioid);
                }
            }
            else {
                p(($portfolio->getErrors()));
            }
        }

        return $this->render('new',
            ['portfolio' => $portfolio]);
    }

    public function actionView()
    {        
        $portfolionum = (int)$_GET['id'];
        $portfolio_obj = Portfolio::find()
                ->filterWhere(['id' => $portfolionum])
                ->one();  
        
        $searchModel = new PortfolioImagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where('portfolioid='.$portfolionum);

        return $this->render('view',
            ['portfolionum'=>$portfolionum,
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
             'portfolio_obj' => $portfolio_obj]);
    }
    
    public function actionUpdate()
    {
        $portfolioid = (int)$_GET['id'];  
        $portfolio = Portfolio::find()->filterWhere(['id'=>$portfolioid])->one();
        
        if (Yii::$app->request->isPost)
        {
            $portfolio->setAttribute('title', $_POST['Portfolio']['title']);
            $portfolio->setAttribute('description', $_POST['Portfolio']['description']);
            $portfolio->setAttribute('userid', Yii::$app->user->id);
            $portfolio->setAttribute('pubdate', time());

            if ($portfolio->validate()){
                if ($portfolio->save(false)){
                    $portfolioid = $portfolio->id;
                    $this->redirect('/admin/portfolio/view?id='.$portfolioid);
                }
            }
        }
        
        return $this->render('update',[
            'portfolio' => $portfolio,
        ]);
    }
    
    public function actionDeleteimage()
    {
        $imageid = (int)$_GET['image'];
        //Находим родительское портфолио для изображения
        $image_obj = PortfolioImages::find()
                ->filterWhere(['id' => $imageid])
                ->one();
        $portfolioid = (int)$image_obj->portfolioid;
        $portfolioimage = PortfolioImages::find()->filterWhere(['id'=>$imageid])->one();
        
        if ($portfolioimage->delete()){
            //перенаправляе на портфолио
            $this->redirect('/admin/portfolio/view?id='.$portfolioid);
        }
    }

    public function actionNewimage()
    {
        $portfolioid = (int)$_GET['portfolio'];
        $portfolio_image = new PortfolioImages();

        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $newfilename = Yii::$app->user->id . '_' . time();             
                if (!empty($_FILES['UploadForm']['name']['file'])) {
                    if ($model->validate()) {
                        $model->file->saveAs('uploads/original/' . $newfilename . '.' . $model->file->extension);
                        Image::thumbnail('uploads/original/' . $newfilename . '.' . $model->file->extension, 360, 240)
                            ->save(Yii::getAlias('uploads/small/' . $newfilename . '.' . $model->file->extension), ['quality' => 80]);
                        Image::thumbnail('uploads/original/' . $newfilename . '.' . $model->file->extension, 540, 360)
                            ->save(Yii::getAlias('uploads/middle/' . $newfilename . '.' . $model->file->extension), ['quality' => 80]);
                        $portfolio_image->setAttribute('image', $newfilename.'.'.$model->file->extension);
                        $portfolio_image->setAttribute('portfolioid', $portfolioid);
                        $portfolio_image->setAttribute('userid', Yii::$app->user->id);
                        $portfolio_image->setAttribute('pubdate', time());
                        if ($portfolio_image->validate()) {
                            if ($portfolio_image->save()) {
                                $this->redirect('/admin/portfolio/view?id=' . $portfolioid);
                            }
                        } 
                        else {
                            try {
                                throw new Exception("Problem with new image loading");
                            } catch (Exception $ex) {
                                //                        p($ex->getMessage());
//                        exit;
                            }                            
                        }
                    }
                    else {
                        try {
                            throw new Exception('Upload Form validation problem');
                        } catch (Exception $ex) {
                                //                        p($ex->getMessage());
//                        exit;
                        }
                        
                    }
                } 
                else {
                    try {
                        throw new Exception('Empty file');
                    } catch (Exception $ex) {
//                        p($ex->getMessage());
//                        exit;
                    }
                    
                }
        }
        return $this->render('newimage',
            ['model' => $model]
        );
    }
    
    public function actionUpdateimage()
    {        
        $imageid = (int)$_GET['image']; 
        $portfolio_image = PortfolioImages::find()->filterWhere(['id' => $imageid])->one();        
        $portfolio_image_obj = PortfolioImages::find()
                ->filterWhere(['id' => $imageid])
                ->one();        
        
        $portfolioid = (int)$portfolio_image_obj->portfolioid;
        
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $newfilename = Yii::$app->user->id . '_' . time();             
                if (!empty($_FILES['UploadForm']['name']['file'])) {
                    if ($model->validate()) {
                        $model->file->saveAs('uploads/original/' . $newfilename . '.' . $model->file->extension);
                        Image::thumbnail('uploads/original/' . $newfilename . '.' . $model->file->extension, 360, 240)
                            ->save(Yii::getAlias('uploads/small/' . $newfilename . '.' . $model->file->extension), ['quality' => 80]);
                        Image::thumbnail('uploads/original/' . $newfilename . '.' . $model->file->extension, 540, 360)
                            ->save(Yii::getAlias('uploads/middle/' . $newfilename . '.' . $model->file->extension), ['quality' => 80]);
                        $portfolio_image->setAttribute('image', $newfilename.'.'.$model->file->extension);
                        $portfolio_image->setAttribute('portfolioid', $portfolioid);
                        $portfolio_image->setAttribute('userid', Yii::$app->user->id);
                        $portfolio_image->setAttribute('pubdate', time());
                        if ($portfolio_image->validate()) {
                            if ($portfolio_image->save()) {
                                $this->redirect('/admin/portfolio/view?id=' . $portfolioid);
                            }
                        } 
                        else {
                            try {
                                throw new Exception("Problem with new image loading");
                            } catch (Exception $ex) {
                                //                        p($ex->getMessage());
//                        exit;
                            }                            
                        }
                    }
                    else {
                        try {
                            throw new Exception('Upload Form validation problem');
                        } catch (Exception $ex) {
                                //                        p($ex->getMessage());
//                        exit;
                        }
                        
                    }
                } 
                else {
                    try {
                        throw new Exception('Empty file');
                    } catch (Exception $ex) {
//                        p($ex->getMessage());
//                        exit;
                    }
                    
                }
        }
        return $this->render('updateimage',
            ['model' => $model]
        );
        
    }
    
    public function actionDelete()
    {
        $id = (int)$_GET['id'];
        if ($id>0){
            if (!Portfolio::find()->filterWhere(['id' => $id])->one()->delete()){
                try {
                    throw new Exception("Cant't delete portfolio with id=".$id);
                } catch (Exception $ex) {
                            
                }
            }
        }
        $this->redirect('/admin/portfolio/index');
    }
    
}
