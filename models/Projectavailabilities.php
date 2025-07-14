<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project_availabilities".
 *
 * @property int $avail_id
 * @property int $avail_projid
 * @property int $avail_title
 * @property string $avail_type
 * @property int $avail_area_in_sqft
 * @property int $avail_qty
 * @property int $avail_bedroom
 * @property int $avail_bathroom
 * @property string $avail_price
 * @property string $avail_other_features comma separated other features
 * @property string $avail_prop_dec
 * @property string $avail_slug
 * @property int $avail_addedby
 * @property string $avail_entrydt
 * @property int $avail_isactive
 *
 * @property Project $availProj
 * @property ProjectImages[] $projectImages
 */
class Projectavailabilities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_availabilities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['avail_projid', 'avail_title', 'avail_type'], 'required'],
            [['avail_projid', 'avail_area_in_sqft', 'avail_qty', 'avail_bedroom', 'avail_bathroom', 'avail_addedby', 'avail_isactive'], 'integer'],
            [['avail_type', 'avail_slug', 'avail_prop_dec'], 'string'],
            [['avail_price'], 'number'],
            [['avail_entrydt', 'avail_other_features'], 'safe'],
            [['avail_projid'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['avail_projid' => 'proj_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'avail_id' => 'Avail ID',
            'avail_projid' => 'Avail Projid',
            'avail_title' => 'Avail Title',
            'avail_type' => 'Avail Type',
            'avail_area_in_sqft' => 'Avail Area In Sqft',
            'avail_qty' => 'Avail Qty',
            'avail_bedroom' => 'Avail Bedroom',
            'avail_bathroom' => 'Avail Bathroom',
            'avail_price' => 'Avail Price',
            'avail_other_features' => 'Avail Other Features',
            'avail_prop_dec' => 'Avail Prop Dec',
            'avail_slug' => 'Avail Slug',
            'avail_addedby' => 'Avail Addedby',
            'avail_entrydt' => 'Avail Entrydt',
            'avail_isactive' => 'Avail Isactive',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvailProj()
    {
        return $this->hasOne(Project::className(), ['proj_id' => 'avail_projid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectImages()
    {
        return $this->hasMany(ProjectImages::className(), ['pimg_propid' => 'avail_id']);
    }
}