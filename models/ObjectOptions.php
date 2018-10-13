<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "object_options".
 *
 * @property integer $id
 * @property integer $objectcategoryid
 * @property integer $objecttypeid
 * @property integer $operationtypeid
 * @property string $object_option
 * @property integer $is_checkbox
 * @property integer $is_dropdown
 */
class ObjectOptions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['objectcategoryid', 'objecttypeid', 'operationtypeid', 'object_option'], 'required'],
            [['objectcategoryid', 'objecttypeid', 'operationtypeid', 'is_checkbox', 'is_dropdown'], 'integer'],
            [['object_option'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'object_option' => Yii::t('app', 'Object Option'),
            'is_checkbox' => Yii::t('app', 'Is Checkbox'),
            'is_dropdown' => Yii::t('app', 'Is Dropdown'),
        ];
    }
}
