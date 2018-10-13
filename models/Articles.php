<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $body
 * @property integer $categoryid
 * @property integer $pub_date
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'body', 'categoryid', 'pub_date'], 'required'],
            [['body'], 'string'],
            [['categoryid', 'pub_date'], 'integer'],
            [['title', 'description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Заголовок'),
            'description' => Yii::t('app', 'Описание'),
            'body' => Yii::t('app', 'Текст'),
            'categoryid' => Yii::t('app', 'Категория'),
            'pub_date' => Yii::t('app', 'Дата публикации'),
        ];
    }
}
