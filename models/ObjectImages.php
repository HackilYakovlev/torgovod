<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "object_images".
 *
 * @property integer $id
 * @property string $image
 * @property integer $objectid
 */
class ObjectImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'objectid'], 'required'],
            [['objectid'], 'integer'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'image' => Yii::t('app', 'Image'),
            'objectid' => Yii::t('app', 'Objectid'),
        ];
    }
}
