<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProjectAvailabilities;

/**
 * ProjectAvailabilitiesSearch represents the model behind the search form of `app\models\ProjectAvailabilities`.
 */
class ProjectAvailabilitiesSearch extends ProjectAvailabilities
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['avail_id', 'avail_projid', 'avail_title', 'avail_area_in_sqft', 'avail_qty', 'avail_bedroom', 'avail_bathroom', 'avail_addedby', 'avail_isactive'], 'integer'],
            [['avail_type', 'avail_other_features', 'avail_prop_dec', 'avail_slug', 'avail_entrydt'], 'safe'],
            [['avail_price'], 'number'],
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
        $query = ProjectAvailabilities::find();

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
            'avail_id' => $this->avail_id,
            'avail_projid' => $this->avail_projid,
            'avail_title' => $this->avail_title,
            'avail_area_in_sqft' => $this->avail_area_in_sqft,
            'avail_qty' => $this->avail_qty,
            'avail_bedroom' => $this->avail_bedroom,
            'avail_bathroom' => $this->avail_bathroom,
            'avail_price' => $this->avail_price,
            'avail_addedby' => $this->avail_addedby,
            'avail_entrydt' => $this->avail_entrydt,
            'avail_isactive' => $this->avail_isactive,
        ]);

        $query->andFilterWhere(['like', 'avail_type', $this->avail_type])
            ->andFilterWhere(['like', 'avail_other_features', $this->avail_other_features])
            ->andFilterWhere(['like', 'avail_prop_dec', $this->avail_prop_dec])
            ->andFilterWhere(['like', 'avail_slug', $this->avail_slug]);

        return $dataProvider;
    }
}
