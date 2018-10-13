<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Meeting;

/**
 * MeetingSearch represents the model behind the search form about `app\models\Meeting`.
 */
class MeetingSearch extends Meeting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'datefrom', 'dateto'], 'integer'],
            [['title', 'place', 'description'], 'safe'],
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
    public function search($params)
    {
        $query = Meeting::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'datefrom' => $this->datefrom,
            'dateto' => $this->dateto,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
