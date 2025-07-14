<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "waterpark_entry".
 *
 * @property int $w_id
 * @property string $w_name
 * @property string $w_mobile
 * @property string $w_email
 * @property string $w_password
 * @property string $w_date
 */
class WaterparkEntry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'waterpark_entry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['w_name', 'w_mobile', 'w_email', 'w_password', 'w_gender', 'w_date'], 'required'],
            [['w_date'], 'safe'],
            [['w_name', 'w_email',  'w_password', 'w_gender',], 'string', 'max' => 255],
            [['w_mobile'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'w_id' => 'ID',
            'w_name' => 'Name',
            'w_mobile' => 'Mobile',
            'w_email' => 'Email',
            'w_password' => 'Password',
            'w_gender' => 'Gender Type',
            'w_date' => 'Date',
        ];
    }
}