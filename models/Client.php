<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $id
 * @property integer $typeid
 * @property string $fio
 * @property string $name
 * @property integer $statusid
 * @property string $email
 * @property string $extinfo
 * @property string $url
 * @property string $address
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['typeid', 'name'], 'required'],
            [['typeid', 'statusid', 'dateadded'], 'integer'],
            [['extinfo'], 'string'],
            [['name', 'email', 'url', 'address'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'typeid' => 'Тип клиента *',
            'name' => 'Ф.И.О. / Название *',
            'statusid' => 'Статус клиента',
            'email' => 'E-mail',
            'extinfo' => 'Доп. информация',
            'url' => 'URL сайта',
            'address' => 'Адрес клиента',
            'dateadded' => 'Дата добавления',
        ];
    }
}
