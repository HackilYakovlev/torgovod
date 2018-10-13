<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Object;
use app\models\ObjectImages;

/**
 * ObjectSearch represents the model behind the search form about `app\models\Object`.
 */
class ObjectWorkedSearch extends ObjectWorked{

    public $image;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'objectcategoryid', 'objecttypeid', 'regionid', 'cityid', 'districtid', 'metroid', 'operationtypeid', 'ownertypeid', 'price', 'pubdate', 'isowner', 'userid'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchWithImage($params)
    {
        $query = ObjectWorked::find();
        $query->select('object_worked.*, object_worked.original_id AS id, object_worked_images.image');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->leftJoin('object_worked_images', "object_worked.original_id=object_worked_images.objectid");

        $query->andFilterWhere([
            'id' => $this->id,
            'objecttypeid' => $this->objecttypeid,
            'objectcategoryid' => $this->objectcategoryid,
            'regionid' => $this->regionid,
            'cityid' => $this->cityid,
            'districtid' => $this->districtid,
            'metroid' => $this->metroid,
            'operationtypeid' => $this->operationtypeid,
            'ownertypeid' => $this->ownertypeid,
            'price' => $this->price,
            'pubdate' => $this->pubdate,
            'isowner' => $this->isowner,
            'userid' => $this->userid,
        ]);

        $query->andFilterWhere(['like', 'objecttypeid', $this->objecttypeid])
            ->andFilterWhere(['like', 'objectcategoryid', $this->objectcategoryid])
            ->andFilterWhere(['like', 'isowner', $this->isowner]);

        return $dataProvider;
    }
}
