<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $title
 * @property integer $creatorid
 * @property integer $executorid
 * @property integer $startdate
 * @property integer $enddate
 * @property integer $duration
 * @property integer $userid
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'creatorid', 'executorid', 'startdate', 'enddate', 'duration', 'userid'], 'required'],
            [['creatorid', 'executorid', 'startdate', 'enddate', 'duration', 'userid'], 'integer'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => 'Название',
            'creatorid' => 'Добавил',
            'executorid' => 'Ответственные',
            'startdate' => 'Начало',
            'enddate' => 'Окончание',
            'duration' => 'Продолжительность',
            'userid' => 'Пользователь',
        ];
    }
}
