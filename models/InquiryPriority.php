<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inquiry_priority".
 *
 * @property integer $id
 * @property string $priority
 */
class InquiryPriority extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inquiry_priority';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['priority'], 'required'],
            [['priority'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'priority' => Yii::t('app', 'Priority'),
        ];
    }
}
