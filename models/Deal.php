<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "deal".
 *
 * @property integer $id
 * @property integer $creatorid
 * @property integer $objectid
 * @property string $objectemployees
 * @property integer $inquiryid
 * @property string $inquiryemployees
 * @property string $commission
 * @property integer $transactionamount
 * @property integer $pubdate
 */
class Deal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['creatorid', 'objectid', 'inquiryid', 'transactionamount', 'pubdate'], 'integer'],
            [['objectemployees', 'inquiryemployees', 'commission', 'transactionamount', 'pubdate'], 'required'],
            [['objectemployees', 'inquiryemployees'], 'string'],
            [['commission'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'creatorid' => 'Добавил сделку',
            'objectid' => 'Объект',
            'objectemployees' => 'Сотрудники объекта',
            'inquiryid' => 'Заявка',
            'inquiryemployees' => 'Сотрудники заявки',
            'commission' => 'Комиссия',
            'transactionamount' => 'Сумма сделки',
            'pubdate' => 'Добавлена',
        ];
    }
}
