<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "biometric_attendance".
 *
 * @property int $id
 * @property int $user_id
 * @property string $type
 * @property string $log_date
 * @property string $created_date
 * @property string $current_dated
 * @property int $isUpated
 * @property string $created_at
 * @property int $updated_by
 * @property string $updated_at
 */
class Biometricattendance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'biometric_attendance';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'isUpated', 'updated_by'], 'integer'],
            [['type'], 'string'],
            [['log_date', 'created_date', 'current_dated', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'type' => 'Type',
            'log_date' => 'Log Date',
            'created_date' => 'Created Date',
            'current_dated' => 'Current Dated',
            'isUpated' => 'Is Upated',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }
}
