<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "object_metro".
 *
 * @property integer $id
 * @property string $metro
 * @property integer $cityid
 */
class ObjectMetro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_metro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['metro', 'cityid'], 'required'],
            [['cityid'], 'integer'],
            [['metro'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'metro' => Yii::t('app', 'Metro'),
            'cityid' => Yii::t('app', 'Cityid'),
        ];
    }
}
