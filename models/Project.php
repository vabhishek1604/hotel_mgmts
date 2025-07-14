<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $proj_id
 * @property string $proj_type
 * @property string $proj_title
 * @property string $proj_slug
 * @property string $proj_state
 * @property string $proj_city
 * @property string $proj_landmark
 * @property string $proj_address
 * @property string $proj_remark
 * @property string $proj_status
 * @property int $proj_addedby
 * @property string $proj_entrydt
 * @property int $proj_updated_by
 * @property string $proj_updated_at
 * @property int $proj_isactive
 *
 * @property ProjectAvailabilities[] $projectAvailabilities
 * @property ProjectImages[] $projectImages
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['proj_type', 'proj_title','proj_status'], 'required'],
            [['proj_type', 'proj_slug', 'proj_address', 'proj_remark'], 'string'],
            [['proj_addedby', 'proj_updated_by', 'proj_isactive'], 'integer'],
            [['proj_entrydt', 'proj_updated_at'], 'safe'],
            [['proj_title', 'proj_landmark'], 'string', 'max' => 255],
            [['proj_state', 'proj_city'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'proj_id' => 'Project ID',
            'proj_type' => 'Project Type',
            'proj_title' => ' Project Name',
            'proj_slug' => ' Slug',
            'proj_state' => ' State',
            'proj_city' => ' City',
            'proj_landmark' => ' Landmark',
            'proj_address' => ' Address',
            'proj_remark' => ' Remark',
            'proj_status' => ' Status',
            'proj_addedby' => ' Addedby',
            'proj_entrydt' => ' Entrydt',
            'proj_updated_by' => ' Updated By',
            'proj_updated_at' => ' Updated At',
            'proj_isactive' => ' Isactive',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectAvailabilities()
    {
        return $this->hasMany(ProjectAvailabilities::className(), ['avail_projid' => 'proj_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectImages()
    {
        return $this->hasMany(ProjectImages::className(), ['pimg_projid' => 'proj_id']);
    }
}
