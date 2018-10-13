<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inquiry".
 *
 * @property integer $id
 * @property integer $clientid
 * @property integer $priorityid
 * @property string $description
 * @property integer $loyaltyid
 * @property integer $findedobjectid
 * @property integer $userid
 */
class Inquiry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inquiry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clientid', 'priorityid', 'loyaltyid', 'findedobjectid', 'userid'], 'integer'],
            [['description', 'findedobjectid', 'userid'], 'required'],
            [['description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'clientid' => 'Клиент',
            'priorityid' => 'Приоритет',
            'description' => 'Описание',
            'loyaltyid' => 'Лояльность',
            'findedobjectid' => 'Объект',
            'userid' => 'Пользователь',
        ];
    }
}
