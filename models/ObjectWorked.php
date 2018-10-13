<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "object_worked".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property integer $objectcategoryid
 * @property integer $objecttypeid
 * @property integer $regionid
 * @property integer $cityid
 * @property integer $districtid
 * @property integer $metroid
 * @property integer $operationtypeid
 * @property integer $ownertypeid
 * @property integer $price
 * @property integer $pubdate
 * @property integer $isowner
 * @property integer $userid
 * @property integer $usertype
 */
class ObjectWorked extends \yii\db\ActiveRecord
{
    public $image;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_worked';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['operationtypeid', 'ownertypeid', 'price', 'pubdate', 'userid'], 'required'],
            [['objectcategoryid', 'objecttypeid', 'regionid', 'cityid', 'districtid', 'metroid', 'operationtypeid', 'ownertypeid', 'price', 'pubdate', 'isowner', 'userid', 'usertype'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => 'Заголовок',
            'description' => 'Описание',
            'objectcategoryid' => 'Категория',
            'objecttypeid' => 'Тип',
            'regionid' => 'Область',
            'cityid' => 'Город',
            'districtid' => 'Район',
            'metroid' => 'Метро',
            'operationtypeid' => 'Тип операции',
            'ownertypeid' => 'Тип собственности',
            'price' => 'Цена',
            'pubdate' => 'Дата публикации',
            'isowner' => 'Собственник',
            'userid' => Yii::t('app', 'Userid'),
            'usertype' => 'Тип пользователя',
        ];
    }
}
