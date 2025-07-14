<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Project;

/**
 * ProjectSearch represents the model behind the search form of `app\models\Project`.
 */
class ProjectSearch extends Project
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['proj_id', 'proj_addedby', 'proj_updated_by', 'proj_isactive'], 'integer'],
            [['proj_title', 'proj_slug', 'proj_state', 'proj_city', 'proj_landmark', 'proj_address', 'proj_remark', 'proj_entrydt', 'proj_updated_at','proj_status'], 'safe'],
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
        $query = Project::find();

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
            'proj_id' => $this->proj_id,
            'proj_addedby' => $this->proj_addedby,
            'proj_entrydt' => $this->proj_entrydt,
            'proj_updated_by' => $this->proj_updated_by,
            'proj_updated_at' => $this->proj_updated_at,
            'proj_isactive' => $this->proj_isactive,
        ]);

        $query->andFilterWhere(['like', 'proj_title', $this->proj_title])
            ->andFilterWhere(['like', 'proj_status', $this->proj_status])
            ->andFilterWhere(['like', 'proj_slug', $this->proj_slug])
            ->andFilterWhere(['like', 'proj_state', $this->proj_state])
            ->andFilterWhere(['like', 'proj_city', $this->proj_city])
            ->andFilterWhere(['like', 'proj_landmark', $this->proj_landmark])
            ->andFilterWhere(['like', 'proj_address', $this->proj_address])
            ->andFilterWhere(['like', 'proj_remark', $this->proj_remark]);

        return $dataProvider;
    }
}
