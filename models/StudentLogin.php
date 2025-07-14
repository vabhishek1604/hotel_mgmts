<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student_login".
 *
 * @property int $St_id
 * @property string $st_name
 * @property string $st_username
 * @property string $st_password
 * @property string $st_gender
 * @property string $st_dob
 * @property string $st_mobile
 * @property string $st_address
 */
class StudentLogin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student_login';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['st_name', 'st_username', 'st_password', 'st_gender', 'st_dob', 'st_mobile', 'st_address'], 'required'],
            [['st_dob'], 'date', 'format' => 'd-M-yyyy'],
            [['st_name', 'st_username', 'st_email', 'st_password', 'st_gender', 'st_address'], 'string', 'max' => 255],
            [['st_mobile'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'St_id' => 'ID',
            'st_name' => 'Name',
            'st_username' => 'Username',
            'st_email' => 'Email',
            'st_password' => 'Password',
            'st_gender' => 'Gender Type',
            'st_dob' => 'Date of Birth',
            'st_mobile' => 'Mobile Number',
            'st_address' => 'Address',
        ];
    }
}