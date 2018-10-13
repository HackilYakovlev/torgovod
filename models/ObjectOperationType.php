<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "object_operation_type".
 *
 * @property integer $id
 * @property string $operation
 */
class ObjectOperationType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_operation_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['operation'], 'required'],
            [['operation'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'operation' => Yii::t('app', 'Operation'),
        ];
    }
}
