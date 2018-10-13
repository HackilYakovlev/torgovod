<?php

namespace app\modules\admin\controllers;

use app\modules\admin\components\AdminController;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Gd;
use Imagine\Image\Point;
use yii\helpers\Json;
use yii\web\UploadedFile;
use app\components\ImageTools;
use Yii;

class ImagesController extends AdminController
{
    public function actionUpload()
    {
        $imageFile = UploadedFile::getInstanceByName('UploadForm[file]');

        $directory = \Yii::getAlias('@app/public_html/uploads/original') . DIRECTORY_SEPARATOR . Yii::$app->user->id . '_';
        if (!is_dir($directory)) {
            mkdir($directory);
        }
        if ($imageFile) {

            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;

            if ($imageFile->saveAs($filePath)) {
                $path = \Yii::getAlias('@app/public_html/uploads/original') . DIRECTORY_SEPARATOR . Yii::$app->user->id . '_' . $fileName;

                //$path = preg_replace('/\//', '\\', $path);
                $imagine = new ImageTools();

                $destination_middle = \Yii::getAlias('@app/public_html/uploads/middle') . DIRECTORY_SEPARATOR . Yii::$app->user->id . '_' . $fileName;

                Image::getImagine()->open($path)->thumbnail(new Box(150, 150))->save($destination_middle , ['quality' => 90]);

                $destination_small = \Yii::getAlias('@app/public_html/uploads/small') . DIRECTORY_SEPARATOR . Yii::$app->user->id . '_' . $fileName;

                Image::getImagine()->open($path)->thumbnail(new Box(70, 70))->save($destination_small , ['quality' => 90]);

                return Json::encode([
                    'files' => [[
                        'hname' => Yii::$app->user->id.'_'.$fileName,
                        'name' => $fileName,
                        'size' => $imageFile->size,
                        "url" => '/uploads/middle/'.Yii::$app->user->id.'_'.$fileName,
                        "thumbnailUrl" => '/uploads/middle/'.Yii::$app->user->id.'_'.$fileName,
                        "deleteUrl" => 'image-delete?name=' . $fileName,
                        "deleteType" => "POST"
                    ]]
                ]);
            }
        }
        return '';
    }
}