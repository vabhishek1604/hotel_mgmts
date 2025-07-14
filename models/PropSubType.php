<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prop_sub_type".
 *
 * @property int $id
 * @property int $sub_type_id
 * @property int $property_id
 * @property int $created_by
 * @property string $created_at
 * @property int $updated_by
 * @property string $updated_at
 *
 * @property SubType $subType
 * @property Property $property
 */
class PropSubType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prop_sub_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sub_type_id', 'property_id'], 'required'],
            [['sub_type_id', 'property_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['sub_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubType::className(), 'targetAttribute' => ['sub_type_id' => 'id']],
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
            'sub_type_id' => 'Sub Type ID',
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
    public function getSubType()
    {
        return $this->hasOne(SubType::className(), ['id' => 'sub_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(Property::className(), ['id' => 'property_id']);
    }
}
