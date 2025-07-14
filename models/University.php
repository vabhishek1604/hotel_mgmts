<?php

namespace app\models;


use Yii;


/**
 * This is the model class for table "university".
 *
 * @property int $u_id
 * @property string $u_name
 * @property string $u_branch
 * @property string $st_name
 * @property string $st_mobile
 * @property string $st_image
 * @property string $st_dob
 * @property string $st_address
 * @property string $branch_desc
 */
class University extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'university';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['u_name', 'u_branch', 'st_name', 'st_mobile', 'st_image', 'st_dob', 'st_address', 'branch_desc'], 'required'],
            [['u_name', 'u_branch', 'st_address'], 'string'],
            [['st_dob'], 'safe'],
            [['st_name', 'st_image', 'branch_desc'], 'string', 'max' => 255],
            [['st_mobile'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'ID',
            'u_name' => 'University Name',
            'u_branch' => 'University Branch',
            'st_name' => 'Student Name',
            'st_mobile' => 'Student Mobile',
            'st_image' => 'Student Image',
            'st_dob' => 'Student Date of birth',
            'st_address' => 'Student Address',
            'branch_desc' => 'Branch Description',
        ];
    }
}
