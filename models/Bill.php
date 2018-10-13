<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bill".
 *
 * @property integer $id
 * @property integer $summ
 * @property integer $date_added
 * @property integer $userid
 */
class Bill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['summ', 'date_added', 'userid'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'summ' => 'Summ',
            'date_added' => 'Date Added',
            'userid' => 'Userid',
        ];
    }
}
