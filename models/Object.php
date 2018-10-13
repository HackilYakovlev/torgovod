<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "object".
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

/**
 * Class Object
 * @package app\models
 *
 */

class Object extends \yii\db\ActiveRecord
{

    public $image;

    public $object_category_array = [];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'operationtypeid', 'ownertypeid', 'price', 'pubdate', 'userid'], 'required'],
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
            'objectcategoryid' => 'Категория недвижимости',
            'objecttypeid' => 'Тип недвижимости',
            'operationtypeid' => 'Тип операции',
            'ownertypeid' => 'Тип собственности',
            'regionid' => 'Область',
            'cityid' => 'Город',
            'districtid' => 'Область',
            'metroid' => 'Метро',
            'price' => 'Цена (в рублях)',
            'pubdate' => 'Дата публикации',
            'isowner' => 'Собственник',
        ];


    }
}
