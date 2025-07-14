<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prop_amenities".
 *
 * @property int $id
 * @property int $amenities_id
 * @property int $property_id
 * @property int $created_by
 * @property string $created_at
 * @property int $updated_by
 * @property string $updated_at
 *
 * @property Amenities $amenities
 * @property Property $property
 */
class PropAmenities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prop_amenities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amenities_id', 'property_id'], 'required'],
            [['amenities_id', 'property_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['amenities_id'], 'exist', 'skipOnError' => true, 'targetClass' => Amenities::className(), 'targetAttribute' => ['amenities_id' => 'id']],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => Property::className(), 'targetAttribute' => ['property_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amenities_id' => 'Amenities ID',
            'property_id' => 'Property ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAmenities()
    {
        return $this->hasOne(Amenities::className(), ['id' => 'amenities_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(Property::className(), ['id' => 'property_id']);
    }
}
