<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WaterparkEntry;

/**
 * WaterparkEntrySearch represents the model behind the search form of `app\models\WaterparkEntry`.
 */
class WaterparkEntrySearch extends WaterparkEntry
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['w_id'], 'integer'],
            [['w_name', 'w_mobile', 'w_email', 'w_password', 'w_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = WaterparkEntry::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'w_id' => $this->w_id,
            'w_date' => $this->w_date,
        ]);

        $query->andFilterWhere(['like', 'w_name', $this->w_name])
            ->andFilterWhere(['like', 'w_mobile', $this->w_mobile])
            ->andFilterWhere(['like', 'w_email', $this->w_email])
            ->andFilterWhere(['like', 'w_password', $this->w_password]);

        return $dataProvider;
    }
}