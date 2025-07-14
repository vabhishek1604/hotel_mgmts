<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Property;

/**
 * PropertySearch represents the model behind the search form of `app\models\Property`.
 */
class PropertySearch extends Property
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'total_floors', 'prop_on_which_floor', 'advisor_id', 'is_active', 'created_by', 'updated_by'], 'integer'],
            [['property_type', 'property_name', 'prop_code', 'project_name', 'house_no', 'land_mark', 'locality', 'city', 'state', 'industrial_area_name', 'ward_number', 'ward_name', 'special_economic_zone', 'ph_no', 'diversion_no', 'carpet_area', 'super_built', 'hall', 'washrooms', 'pantry', 'promoter_name', 'bedroom', 'furnishing', 'add_other_rooms', 'dedicated_trnsformer', 'reserved_parking', 'dedicated_transformer', 'availability', 'possession_by', 't_and_cp', 'nagar_nigam_approved', 'ownership_type', 'collectrate_rate_type', 'price_negotiable', 'water_source', 'over_looking', 'expected_property_valuation', 'commercial_project_coming', 'special_points', 'hypothecation_details', 'ownership', 'created_at', 'updated_at'], 'safe'],
            [['selling_price', 'collectrate_rate_sqft'], 'number'],
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
        $query = Property::find();

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
            'total_floors' => $this->total_floors,
            'prop_on_which_floor' => $this->prop_on_which_floor,
            'selling_price' => $this->selling_price,
            'collectrate_rate_sqft' => $this->collectrate_rate_sqft,
            'advisor_id' => $this->advisor_id,
            'is_active' => $this->is_active,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'property_type', $this->property_type])
            ->andFilterWhere(['like', 'property_name', $this->property_name])
            ->andFilterWhere(['like', 'prop_code', $this->prop_code])
            ->andFilterWhere(['like', 'project_name', $this->project_name])
            ->andFilterWhere(['like', 'house_no', $this->house_no])
            ->andFilterWhere(['like', 'land_mark', $this->land_mark])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'industrial_area_name', $this->industrial_area_name])
            ->andFilterWhere(['like', 'ward_number', $this->ward_number])
            ->andFilterWhere(['like', 'ward_name', $this->ward_name])
            ->andFilterWhere(['like', 'special_economic_zone', $this->special_economic_zone])
            ->andFilterWhere(['like', 'ph_no', $this->ph_no])
            ->andFilterWhere(['like', 'diversion_no', $this->diversion_no])
            ->andFilterWhere(['like', 'carpet_area', $this->carpet_area])
            ->andFilterWhere(['like', 'super_built', $this->super_built])
            ->andFilterWhere(['like', 'hall', $this->hall])
            ->andFilterWhere(['like', 'washrooms', $this->washrooms])
            ->andFilterWhere(['like', 'pantry', $this->pantry])
            ->andFilterWhere(['like', 'promoter_name', $this->promoter_name])
            ->andFilterWhere(['like', 'bedroom', $this->bedroom])
            ->andFilterWhere(['like', 'furnishing', $this->furnishing])
            ->andFilterWhere(['like', 'add_other_rooms', $this->add_other_rooms])
            ->andFilterWhere(['like', 'dedicated_trnsformer', $this->dedicated_trnsformer])
            ->andFilterWhere(['like', 'reserved_parking', $this->reserved_parking])
            ->andFilterWhere(['like', 'dedicated_transformer', $this->dedicated_transformer])
            ->andFilterWhere(['like', 'availability', $this->availability])
            ->andFilterWhere(['like', 'possession_by', $this->possession_by])
            ->andFilterWhere(['like', 't_and_cp', $this->t_and_cp])
            ->andFilterWhere(['like', 'nagar_nigam_approved', $this->nagar_nigam_approved])
            ->andFilterWhere(['like', 'ownership_type', $this->ownership_type])
            ->andFilterWhere(['like', 'collectrate_rate_type', $this->collectrate_rate_type])
            ->andFilterWhere(['like', 'price_negotiable', $this->price_negotiable])
            ->andFilterWhere(['like', 'water_source', $this->water_source])
            ->andFilterWhere(['like', 'over_looking', $this->over_looking])
            ->andFilterWhere(['like', 'expected_property_valuation', $this->expected_property_valuation])
            ->andFilterWhere(['like', 'commercial_project_coming', $this->commercial_project_coming])
            ->andFilterWhere(['like', 'special_points', $this->special_points])
            ->andFilterWhere(['like', 'hypothecation_details', $this->hypothecation_details])
            ->andFilterWhere(['like', 'ownership', $this->ownership]);

        return $dataProvider;
    }
}