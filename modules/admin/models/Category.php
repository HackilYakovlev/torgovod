<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $lft
 * @property integer $rgt
 * @property integer $depth
 * @property string $name
 * @property string $title
 * @property integer $tree
 * @property integer $root
 * @property integer $weight
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lft', 'rgt', 'depth', 'name', 'title', 'tree', 'root', 'weight'], 'required'],
            [['lft', 'rgt', 'depth', 'tree', 'root', 'weight'], 'integer'],
            [['name', 'title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lft' => 'Lft',
            'rgt' => 'Rgt',
            'depth' => 'Depth',
            'name' => 'Name',
            'title' => 'Title',
            'tree' => 'Tree',
            'root' => 'Root',
            'weight' => 'Weight',
        ];
    }
}
