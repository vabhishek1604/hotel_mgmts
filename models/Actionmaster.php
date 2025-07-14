<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "action_master".
 *
 * @property int $id
 * @property int $group_id
 * @property string $action_type
 * @property int $action_id
 * @property string $action_name
 * @property string $action_url
 * @property string $remark
 * @property int $addedby
 * @property string $entrydt
 * @property int $updated_by
 * @property string $updated_at
 * @property int $is_active
 *
 * @property Groups $group
 * @property Actionmaster $action
 * @property Actionmaster[] $actionmasters
 */
class Actionmaster extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'action_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['group_id', 'action_id', 'addedby', 'updated_by', 'is_active'], 'integer'],
            [['action_type', 'action_name', 'action_url'], 'required'],
            [['action_type', 'remark'], 'string'],
            [['entrydt', 'updated_at'], 'safe'],
            [['action_name', 'action_url'], 'string', 'max' => 100],
            [['group_id'], 'exist', 'skipOnError' => true, 'targetClass' => Groups::className(), 'targetAttribute' => ['group_id' => 'id']],
            [['action_id'], 'exist', 'skipOnError' => true, 'targetClass' => Actionmaster::className(), 'targetAttribute' => ['action_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_id' => 'Group',
            'action_type' => 'Action Type',
            'action_id' => 'Main Menu',
            'action_name' => 'Action Name',
            'action_url' => 'Action Url',
            'remark' => 'Remark',
            'addedby' => 'Addedby',
            'entrydt' => 'Entrydt',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
            'is_active' => 'Is Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroup()
    {
        return $this->hasOne(Groups::className(), ['id' => 'group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAction()
    {
        return $this->hasOne(Actionmaster::className(), ['id' => 'action_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActionmasters()
    {
        return $this->hasMany(Actionmaster::className(), ['action_id' => 'id']);
    }
}