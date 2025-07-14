<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Agriculture;

/**
 * AgricultureSearch represents the model behind the search form of `app\models\Agriculture`.
 */
class AgricultureSearch extends Agriculture
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'advisor_id', 'is_active', 'created_by', 'updated_by'], 'integer'],
            [['prop_code', 'prop_secret_code', 'pro_type', 'soil_type', 'owner_type', 'pro_seller', 'pro_landmark', 'pro_village', 'pro_tehsil', 'pro_district', 'ph_no', 'khasra_no', 'diversion_type', 'diversion_no', 'water_level', 'water_source', 'land_type', 'road_connectivity', 'dist_from_front', 'dist_from_road', 'electricity_avail', 'dist_from_high_tension_line', 'district_centre', 'tehsil', 'village', 'ownership_type', 'govt_guideline', 'market_value', 'new_project_coming', 'special_points', 'selling_time_req', 'if_dispute', 'claims_from_co_owners', 'family', 'misrepresentation_by_seller', 'bad_title_of_property', 'disputes_related_to_property_acquired_as_a_gift_or_through_will', 'disputes_related_to_easements_rights', 'Others', 'created_at', 'updated_at'], 'safe'],
            [['selling_price', 'expected_property_valuation'], 'number'],
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
        $query = Agriculture::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
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
            'selling_price' => $this->selling_price,
            'expected_property_valuation' => $this->expected_property_valuation,
            'advisor_id' => $this->advisor_id,
            'is_verified' => $this->is_verified,
            'is_active' => $this->is_active,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_by' => $this->updated_by,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'prop_code', $this->prop_code])
            ->andFilterWhere(['like', 'prop_secret_code', $this->prop_secret_code])
            ->andFilterWhere(['like', 'pro_type', $this->pro_type])
            ->andFilterWhere(['like', 'soil_type', $this->soil_type])
            ->andFilterWhere(['like', 'owner_type', $this->owner_type])
            ->andFilterWhere(['like', 'pro_seller', $this->pro_seller])
            ->andFilterWhere(['like', 'contact_no', $this->contact_no])
            ->andFilterWhere(['like', 'pro_landmark', $this->pro_landmark])
            ->andFilterWhere(['like', 'pro_village', $this->pro_village])
            ->andFilterWhere(['like', 'pro_tehsil', $this->pro_tehsil])
            ->andFilterWhere(['like', 'pro_district', $this->pro_district])
            ->andFilterWhere(['like', 'area', $this->area])
            ->andFilterWhere(['like', 'area_unit', $this->area_unit])
            ->andFilterWhere(['like', 'ph_no', $this->ph_no])
            ->andFilterWhere(['like', 'khasra_no', $this->khasra_no])
            ->andFilterWhere(['like', 'diversion_type', $this->diversion_type])
            ->andFilterWhere(['like', 'diversion_no', $this->diversion_no])
            ->andFilterWhere(['like', 'water_level', $this->water_level])
            ->andFilterWhere(['like', 'water_source', $this->water_source])
            ->andFilterWhere(['like', 'land_type', $this->land_type])
            ->andFilterWhere(['like', 'road_connectivity', $this->road_connectivity])
            ->andFilterWhere(['like', 'dist_from_front', $this->dist_from_front])
            ->andFilterWhere(['like', 'dist_from_road', $this->dist_from_road])
            ->andFilterWhere(['like', 'electricity_avail', $this->electricity_avail])
            ->andFilterWhere(['like', 'dist_from_high_tension_line', $this->dist_from_high_tension_line])
            ->andFilterWhere(['like', 'district_centre', $this->district_centre])
            ->andFilterWhere(['like', 'tehsil', $this->tehsil])
            ->andFilterWhere(['like', 'village', $this->village])
            ->andFilterWhere(['like', 'ownership_type', $this->ownership_type])
            ->andFilterWhere(['like', 'govt_guideline', $this->govt_guideline])
            ->andFilterWhere(['like', 'market_value', $this->market_value])
            ->andFilterWhere(['like', 'new_project_coming', $this->new_project_coming])
            ->andFilterWhere(['like', 'special_points', $this->special_points])
            ->andFilterWhere(['like', 'selling_time_req', $this->selling_time_req])
            ->andFilterWhere(['like', 'if_dispute', $this->if_dispute])
            ->andFilterWhere(['like', 'claims_from_co_owners', $this->claims_from_co_owners])
            ->andFilterWhere(['like', 'family', $this->family])
            ->andFilterWhere(['like', 'misrepresentation_by_seller', $this->misrepresentation_by_seller])
            ->andFilterWhere(['like', 'bad_title_of_property', $this->bad_title_of_property])
            ->andFilterWhere(['like', 'disputes_related_to_property_acquired_as_a_gift_or_through_will', $this->disputes_related_to_property_acquired_as_a_gift_or_through_will])
            ->andFilterWhere(['like', 'disputes_related_to_easements_rights', $this->disputes_related_to_easements_rights])
            ->andFilterWhere(['like', 'Others', $this->Others]);

        return $dataProvider;
    }
}