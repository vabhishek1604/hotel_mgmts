<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Members;

/**
 * MembersSearch represents the model behind the search form of `app\models\Members`.
 */
class MembersSearch extends Members
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mem_id'], 'integer'],
            [['mem_name', 'mem_username', 'mem_email', 'mem_password'], 'safe'],
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
        $query = Members::find();

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
            'mem_id' => $this->mem_id,
        ]);

        $query->andFilterWhere(['like', 'mem_name', $this->mem_name])
            ->andFilterWhere(['like', 'mem_username', $this->mem_username])
            ->andFilterWhere(['like', 'mem_email', $this->mem_email])
            ->andFilterWhere(['like', 'mem_password', $this->mem_password]);

        return $dataProvider;
    }
}
