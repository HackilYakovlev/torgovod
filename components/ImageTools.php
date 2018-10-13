<?php
/**
 * Created by PhpStorm.
 * User: Ilya
 * Date: 06.04.2016
 * Time: 18:58
 */

namespace app\components;

use yii\imagine\Image;

class ImageTools extends Image {

    public static $driver = [
        self::DRIVER_IMAGICK,
        self::DRIVER_GD2,
        self::DRIVER_GMAGICK
    ];

}