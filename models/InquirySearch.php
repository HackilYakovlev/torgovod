<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Inquiry;

/**
 * InquirySearch represents the model behind the search form about `app\models\Inquiry`.
 */
class InquirySearch extends Inquiry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'clientid', 'priorityid', 'loyaltyid', 'findedobjectid', 'userid'], 'integer'],
            [['description'], 'safe'],
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
        $query = Inquiry::find();

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
            'clientid' => $this->clientid,
            'priorityid' => $this->priorityid,
            'loyaltyid' => $this->loyaltyid,
            'findedobjectid' => $this->findedobjectid,
            'userid' => $this->userid,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
