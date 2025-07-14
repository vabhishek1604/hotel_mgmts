<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\University;

/**
 * UniversitySearch represents the model behind the search form of `app\models\University`.
 */
class UniversitySearch extends University
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['u_id'], 'integer'],
            [['u_name', 'u_branch', 'st_name', 'st_mobile', 'st_image', 'st_dob', 'st_address', 'branch_desc'], 'safe'],
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
        $query = University::find();

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
            'u_id' => $this->u_id,
            'st_dob' => $this->st_dob,
        ]);

        $query->andFilterWhere(['like', 'u_name', $this->u_name])
            ->andFilterWhere(['like', 'u_branch', $this->u_branch])
            ->andFilterWhere(['like', 'st_name', $this->st_name])
            ->andFilterWhere(['like', 'st_mobile', $this->st_mobile])
            ->andFilterWhere(['like', 'st_image', $this->st_image])
            ->andFilterWhere(['like', 'st_address', $this->st_address])
            ->andFilterWhere(['like', 'branch_desc', $this->branch_desc]);

        return $dataProvider;
    }
}
