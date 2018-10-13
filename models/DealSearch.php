<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Deal;

/**
 * DealSearch represents the model behind the search form about `app\models\Deal`.
 */
class DealSearch extends Deal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'creatorid', 'objectid', 'inquiryid', 'transactionamount', 'pubdate'], 'integer'],
            [['objectemployees', 'inquiryemployees', 'commission'], 'safe'],
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
        $query = Deal::find();

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
            'creatorid' => $this->creatorid,
            'objectid' => $this->objectid,
            'inquiryid' => $this->inquiryid,
            'transactionamount' => $this->transactionamount,
            'pubdate' => $this->pubdate,
        ]);

        $query->andFilterWhere(['like', 'objectemployees', $this->objectemployees])
            ->andFilterWhere(['like', 'inquiryemployees', $this->inquiryemployees])
            ->andFilterWhere(['like', 'commission', $this->commission]);

        return $dataProvider;
    }
}
