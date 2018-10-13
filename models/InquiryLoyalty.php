<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inquiry_loyalty".
 *
 * @property integer $id
 * @property string $loyalty
 */
class InquiryLoyalty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inquiry_loyalty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loyalty'], 'required'],
            [['loyalty'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'loyalty' => Yii::t('app', 'Loyalty'),
        ];
    }
}
