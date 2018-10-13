<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "meeting".
 *
 * @property integer $id
 * @property string $title
 * @property integer $datefrom
 * @property integer $dateto
 * @property string $place
 * @property string $description
 * @property integer $userid
 */
class Meeting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'meeting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'place', 'description', 'userid'], 'required'],
            [['datefrom', 'dateto', 'userid'], 'integer'],
            [['description'], 'string'],
            [['title', 'place'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => 'Цель / название',
            'datefrom' => 'Начало',
            'dateto' => 'Окончание',
            'place' => 'Место',
            'description' => 'Описание',
            'userid' => Yii::t('app', 'Userid'),
        ];
    }
}
