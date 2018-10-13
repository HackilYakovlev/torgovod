<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "object_type".
 *
 * @property integer $id
 * @property string $type
 * @property integer $objectcategoryid
 */
class ObjectType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['objectcategoryid'], 'integer'],
            [['type'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'objectcategoryid' => Yii::t('app', 'Objectcategoryid'),
        ];
    }
}
