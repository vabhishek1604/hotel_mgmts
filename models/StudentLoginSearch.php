<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\StudentLogin;

/**
 * StudentLoginSearch represents the model behind the search form of `app\models\StudentLogin`.
 */
class StudentLoginSearch extends StudentLogin
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['St_id'], 'integer'],
            [['st_name', 'st_username', 'st_email', 'st_password', 'st_gender', 'st_dob', 'st_mobile', 'st_address'], 'safe'],
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
        $query = StudentLogin::find();

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
            'St_id' => $this->St_id,
            'st_dob' => $this->st_dob,
        ]);

        $query->andFilterWhere(['like', 'st_name', $this->st_name])
            ->andFilterWhere(['like', 'st_username', $this->st_username])
            ->andFilterWhere(['like', 'st_password', $this->st_password])
            ->andFilterWhere(['like', 'st_gender', $this->st_gender])
            ->andFilterWhere(['like', 'st_mobile', $this->st_mobile])
            ->andFilterWhere(['like', 'st_address', $this->st_address]);

        return $dataProvider;
    }
}