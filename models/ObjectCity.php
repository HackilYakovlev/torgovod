<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "object_city".
 *
 * @property integer $id
 * @property string $city
 * @property integer $districtid
 */
class ObjectCity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city', 'districtid'], 'required'],
            [['districtid'], 'integer'],
            [['city'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'city' => Yii::t('app', 'City'),
            'districtid' => Yii::t('app', 'Districtid'),
        ];
    }
}
