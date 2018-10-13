<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "object_options_checkbox_fields".
 *
 * @property integer $id
 * @property integer $optionid
 * @property string $value
 */
class ObjectOptionsCheckboxFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_options_checkbox_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['optionid', 'value'], 'required'],
            [['optionid'], 'integer'],
            [['value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'optionid' => Yii::t('app', 'Optionid'),
            'value' => Yii::t('app', 'Value'),
        ];
    }
}
