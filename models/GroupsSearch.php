<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Groups;

/**
 * GroupsSearch represents the model behind the search form of `app\models\Groups`.
 */
class GroupsSearch extends Groups
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'isactive'], 'integer'],
            [['group_name', 'action'], 'safe'],
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
        $query = Groups::find();

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
            'id' => $this->id,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'group_name', $this->group_name])
            ->andFilterWhere(['like', 'action', $this->action]);

        return $dataProvider;
    }
}
