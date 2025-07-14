<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agriculture".
 *
 * @property int $id
 * @property string $prop_code
 * @property string $prop_secret_code
 * @property string $pro_type
 * @property string $soil_type
 * @property string $owner_type
 * @property string $pro_seller
 * @property string $contact_no
 * @property string $pro_landmark
 * @property string $pro_village
 * @property string $pro_tehsil
 * @property string $pro_district
 * @property string $area
 * @property string $area_unit
 * @property string $ph_no
 * @property string $khasra_no
 * @property string $diversion_type
 * @property string $diversion_no
 * @property string $water_level
 * @property string $water_source
 * @property string $land_type
 * @property string $road_connectivity
 * @property string $dist_from_front
 * @property string $dist_from_road
 * @property string $electricity_avail
 * @property string $dist_from_high_tension_line
 * @property string $district_centre
 * @property string $tehsil
 * @property string $village
 * @property string $ownership_type
 * @property string $govt_guideline
 * @property string $market_value
 * @property string $selling_price
 * @property string $expected_property_valuation
 * @property string $new_project_coming
 * @property string $special_points
 * @property string $selling_time_req
 * @property string $if_dispute
 * @property string $claims_from_co_owners
 * @property string $family
 * @property string $misrepresentation_by_seller
 * @property string $bad_title_of_property
 * @property string $disputes_related_to_property_acquired_as_a_gift_or_through_will
 * @property string $disputes_related_to_easements_rights
 * @property string $Others
 * @property int $is_verified
 * @property int $advisor_id
 * @property int $is_active
 * @property int $created_by
 * @property string $created_at
 * @property int $updated_by
 * @property string $updated_at
 */
class Agriculture extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'agriculture';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_type', 'land_type1', 'soil_type', 'owner_type', 'pro_seller', 'contact_no', 'diversion_type', 'land_type', 'road_connectivity', 'electricity_avail', 'ownership_type', 'new_project_coming', 'special_points'], 'string'],
            [['owner_type', 'pro_landmark', 'pro_village', 'pro_tehsil', 'pro_district', 'selling_price', 'expected_property_valuation'], 'required'],
            [['advisor_id', 'is_active', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['prop_code', 'prop_secret_code', 'diversion_no', 'water_level', 'dist_from_front', 'dist_from_road', 'dist_from_high_tension_line', 'district_centre', 'tehsil', 'village', 'govt_guideline', 'market_value', 'selling_time_req'], 'safe'],
            [['pro_landmark', 'pro_village', 'pro_tehsil', 'pro_district', 'area', 'area_unit', 'ph_no', 'khasra_no', 'water_source'], 'safe'],
            [['if_dispute', 'claims_from_co_owners', 'family', 'legal_heirs', 'misrepresentation_by_seller', 'bad_title_of_property', 'disputes_related_to_property_acquired_as_a_gift_or_through_will', 'disputes_related_to_easements_rights', 'Others', 'is_verified'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'prop_code' => Yii::t('app', 'Property Code'),
            'prop_secret_code' => Yii::t('app', 'Property Secret Code'),
            'pro_type' => Yii::t('app', 'Property Type'),
            'land_type1' => Yii::t('app', 'Land Type'),
            'soil_type' => Yii::t('app', 'Soil Type'),
            'owner_type' => Yii::t('app', 'Owner Type'),
            'pro_seller' => Yii::t('app', 'Property Seller'),
            'contact_no' => Yii::t('app', 'Contact Number'),
            'pro_landmark' => Yii::t('app', 'Landmark'),
            'pro_village' => Yii::t('app', 'Village'),
            'pro_tehsil' => Yii::t('app', 'Tehsil'),
            'pro_district' => Yii::t('app', 'District'),
            'area' => Yii::t('app', 'Land Area'),
            'area_unit' => Yii::t('app', 'Area Unit'),
            'ph_no' => Yii::t('app', 'Ph Number'),
            'khasra_no' => Yii::t('app', 'Khasra Number'),
            'diversion_type' => Yii::t('app', 'Diversion Type'),
            'diversion_no' => Yii::t('app', 'If Diverted (Diversion Number)'),
            'water_level' => Yii::t('app', 'Water Level'),
            'water_source' => Yii::t('app', 'Water Source'),
            'land_type' => Yii::t('app', 'Land Type'),
            'road_connectivity' => Yii::t('app', 'Road Connectivity'),
            'dist_from_front' => Yii::t('app', 'If on Main Road (Front)'),
            'dist_from_road' => Yii::t('app', 'Distance From Road'),
            'electricity_avail' => Yii::t('app', 'Electricity Available'),
            'dist_from_high_tension_line' => Yii::t('app', 'Distance From High Tension Line'),
            'district_centre' => Yii::t('app', 'District Centre'),
            'tehsil' => Yii::t('app', 'Tehsil'),
            'village' => Yii::t('app', 'Village'),
            'ownership_type' => Yii::t('app', 'Ownership Type'),
            'govt_guideline' => Yii::t('app', 'Govt. Guideline'),
            'market_value' => Yii::t('app', 'Market Value'),
            'selling_price' => Yii::t('app', 'Selling Price'),
            'expected_property_valuation' => Yii::t('app', 'Expected Property Valuation'),
            'new_project_coming' => Yii::t('app', 'Any New Project Coming Nearby'),
            'special_points' => Yii::t('app', 'Description'),
            'selling_time_req' => Yii::t('app', 'Required Selling Time'),
            'if_dispute' => Yii::t('app', 'If Dispute'),
            'claims_from_co_owners' => Yii::t('app', 'Claims From Co Owners'),
            'family' => Yii::t('app', 'Family'),
            'legal_heirs' => Yii::t('app', 'Legal Heirs'),
            'misrepresentation_by_seller' => Yii::t('app', 'Misrepresentation By Seller'),
            'bad_title_of_property' => Yii::t('app', 'Bad Title Of Property'),
            'disputes_related_to_property_acquired_as_a_gift_or_through_will' => Yii::t('app', 'Disputes Related To Property Acquired As A Gift Or Through Will'),
            'disputes_related_to_easements_rights' => Yii::t('app', 'Disputes Related To Easements Rights'),
            'Others' => Yii::t('app', 'Others'),
            'is_verified' => Yii::t('app', 'is_verified'),
            'advisor_id' => Yii::t('app', 'Advisor Name'),
            'is_active' => Yii::t('app', 'Is Active'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }


    public function getPropAmenities()
    {
        return $this->hasMany(PropAmenities::className(), ['agriculture_id' => 'id']);
    }

    public function getButton($data)
    {
        $is_active = '';
        $button = '';

        if ($data->is_active == 0) {
            $is_active = 1;
            $button .= '<span id="span_' . $data->id . '"><buttton type="button" data-loading-text="Please wait..." id="btn' . $data->id . '" onclick="changeStatus(' . $data->id . ',1)" class="btn btn-sm btn-danger">Disable</button></span>';
        } else if ($data->is_active == 1) {
            $is_active = 0;
            $button .= '<span id="span_' . $data->id . '"><buttton type="button" data-loading-text="Please wait..." id="btn' . $data->id . '" onclick="changeStatus(' . $data->id . ',0)" class="btn btn-sm btn-success">Enable</button></span>';
        }

        return $button;
    }
}