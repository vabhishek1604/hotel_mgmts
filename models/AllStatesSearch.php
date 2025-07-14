<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AllStates;

/**
 * AllStatesSearch represents the model behind the search form of `app\models\AllStates`.
 */
class AllStatesSearch extends AllStates
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['st_id', 'st_code'], 'integer'],
            [['st_name'], 'safe'],
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
        $query = AllStates::find();

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
            'st_id' => $this->st_id,
            'st_code' => $this->st_code,
        ]);

        $query->andFilterWhere(['like', 'st_name', $this->st_name]);

        return $dataProvider;
    }
}
