<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Actionmaster;

/**
 * ActionmasterSearch represents the model behind the search form of `app\models\Actionmaster`.
 */
class ActionmasterSearch extends Actionmaster
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'group_id', 'action_id', 'addedby', 'updated_by', 'is_active'], 'integer'],
            [['action_type', 'action_name', 'action_url', 'remark', 'entrydt', 'updated_at'], 'safe'],
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
        $query = Actionmaster::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
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
            'group_id' => $this->group_id,
            'action_id' => $this->action_id,
            'addedby' => $this->addedby,
            'entrydt' => $this->entrydt,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
            'is_active' => $this->is_active,
        ]);

        $query->andFilterWhere(['like', 'action_type', $this->action_type])
            ->andFilterWhere(['like', 'action_name', $this->action_name])
            ->andFilterWhere(['like', 'action_url', $this->action_url])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}