<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "object_district".
 *
 * @property integer $id
 * @property string $district
 */
class ObjectDistrict extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_district';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['district'], 'required'],
            [['district'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'district' => Yii::t('app', 'District'),
        ];
    }
}
