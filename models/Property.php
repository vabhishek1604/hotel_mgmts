<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "property".
 *
 * @property int $id
 * @property string $property_type
 * @property string $types
 * @property string $property_name
 * @property string $prop_code
 * @property string $project_name
 * @property string $land_mark
 * @property string $locality
 * @property string $city
 * @property string $state
 * @property string $industrial_area_name
 * @property string $ward_number
 * @property string $ward_name
 * @property string $special_economic_zone
 * @property string $ph_no
 * @property string $diversion_no
 * @property string $carpet_area
 * @property string $super_built
 * @property string $hall
 * @property string $washrooms
 * @property string $pantry
 * @property string $promoter_name
 * @property string $bedroom
 * @property string $furnishing
 * @property string $add_other_rooms
 * @property int $total_floors
 * @property int $prop_on_which_floor
 * @property string $dedicated_trnsformer
 * @property string $reserved_parking
 * @property string $dedicated_transformer
 * @property string $availability
 * @property string $possession_by
 * @property string $t_and_cp
 * @property string $nagar_nigam_approved
 * @property string $ownership_type
 * @property string $selling_price
 * @property string $collectrate_rate_sqft
 * @property string $collectrate_rate_type
 * @property string $price_negotiable
 * @property string $water_source
 * @property string $over_looking
 * @property string $expected_property_valuation
 * @property string $commercial_project_coming
 * @property string $special_points
 * @property string $hypothecation_details
 * @property string $ownership
 * @property int $advisor_id
 * @property int $is_active
 * @property int $created_by
 * @property string $created_at
 * @property int $updated_by
 * @property string $updated_at
 *
 * @property PropAmenities[] $propAmenities
 */
class Property extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'property';
    }
    public $amenities_ids = [];
    public function rules()
    {
        return [
            [['property_type', 'project_name', 'land_mark', 'locality', 'city', 'state', 'industrial_area_name', 'ph_no'], 'required'],
            [['property_type', 'washrooms', 'pantry', 'dedicated_trnsformer', 'reserved_parking', 'dedicated_transformer', 'availability', 't_and_cp', 'nagar_nigam_approved', 'ownership_type', 'collectrate_rate_type', 'price_negotiable', 'over_looking', 'commercial_project_coming', 'special_points', 'ownership'], 'string'],
            [['total_floors', 'prop_on_which_floor', 'advisor_id', 'is_active', 'created_by', 'updated_by'], 'integer'],
            [['selling_price', 'collectrate_rate_sqft'], 'number'],
            [['created_at', 'updated_at', 'types', 'water_source'], 'safe'],
            [['property_name', 'house_no', 'bedroom', 'project_name', 'land_mark', 'locality', 'city', 'state', 'industrial_area_name', 'ward_number', 'ward_name', 'special_economic_zone', 'diversion_no', 'possession_by', 'expected_property_valuation', 'hypothecation_details'], 'string', 'max' => 255],
            [['prop_code'], 'string', 'max' => 100],
            [['ph_no'], 'string', 'max' => 10],
            [['carpet_area', 'super_built', 'hall', 'promoter_name', 'furnishing', 'add_other_rooms'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'property_type' => Yii::t('app', 'Property Type'),
            'types' => Yii::t('app', 'Property Sub Types'),
            'property_name' => Yii::t('app', 'Property Name'),
            'prop_code' => Yii::t('app', 'Property Code'),
            'house_no' => Yii::t('app', 'House /Street Number'),
            'project_name' => Yii::t('app', 'Project Name'),
            'land_mark' => Yii::t('app', 'Land Mark'),
            'locality' => Yii::t('app', 'Locality'),
            'city' => Yii::t('app', 'City'),
            'state' => Yii::t('app', 'State'),
            'industrial_area_name' => Yii::t('app', 'Industrial Area Name'),
            'ward_number' => Yii::t('app', 'Ward Number'),
            'ward_name' => Yii::t('app', 'Ward Name'),
            'special_economic_zone' => Yii::t('app', 'Special Economic Zone'),
            'ph_no' => Yii::t('app', 'Ph Number'),
            'diversion_no' => Yii::t('app', 'Diversion Number'),
            'carpet_area' => Yii::t('app', 'Carpet Area In sqft'),
            'super_built' => Yii::t('app', 'Super Buildup area In sqft'),
            'hall' => Yii::t('app', 'Hall Area In sqft'),
            'washrooms' => Yii::t('app', 'Washrooms'),
            'pantry' => Yii::t('app', 'Kitchen'),
            'promoter_name' => Yii::t('app', 'Promoter Name'),
            'bedroom' => Yii::t('app', 'Bedroom'),
            'furnishing' => Yii::t('app', 'Furnishing'),
            'add_other_rooms' => Yii::t('app', 'Add Other Rooms'),
            'total_floors' => Yii::t('app', 'Total Floors'),
            'prop_on_which_floor' => Yii::t('app', 'Property On Which Floor'),
            'dedicated_trnsformer' => Yii::t('app', 'Dedicated Trnsformer'),
            'reserved_parking' => Yii::t('app', 'Reserved Parking'),
            'dedicated_transformer' => Yii::t('app', 'Dedicated Transformer'),
            'availability' => Yii::t('app', 'Availability'),
            'possession_by' => Yii::t('app', 'Possession By'),
            't_and_cp' => Yii::t('app', 'T & Cp Approved'),
            'nagar_nigam_approved' => Yii::t('app', 'Nagar Nigam Approved'),
            'ownership_type' => Yii::t('app', 'Ownership Type'),
            'selling_price' => Yii::t('app', 'Selling Price'),
            'collectrate_rate_sqft' => Yii::t('app', 'Collectrate Rate per sqft'),
            'collectrate_rate_type' => Yii::t('app', 'Collectrate Rate Type'),
            'price_negotiable' => Yii::t('app', 'Price Negotiable'),
            'water_source' => Yii::t('app', 'Water Source'),
            'over_looking' => Yii::t('app', 'Over Looking'),
            'expected_property_valuation' => Yii::t('app', 'Expected Property Valuation'),
            'commercial_project_coming' => Yii::t('app', 'Commercial Project Coming'),
            'special_points' => Yii::t('app', 'Any Other Social Points To Mention'),
            'hypothecation_details' => Yii::t('app', 'Hypothecation Details'),
            'ownership' => Yii::t('app', 'Ownership'),
            'advisor_id' => Yii::t('app', 'Advisor Name'),
            'is_active' => Yii::t('app', 'Is Active'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */


    public function getPropAmenities()
    {
        return $this->hasMany(PropAmenities::className(), ['property_id' => 'id']);
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