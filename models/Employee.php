<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string|null $emp_id
 * @property string $emp_type
 * @property string|null $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property string|null $father_name
 * @property string|null $mother_name
 * @property string|null $contact_no
 * @property string|null $photo
 * @property string|null $alt_contact_no
 * @property string|null $dob
 * @property string|null $doj
 * @property string|null $gender
 * @property string|null $blood_group
 * @property string|null $adhaar_card
 * @property string|null $adhaar_photo
 * @property string|null $state_id
 * @property string|null $district
 * @property string|null $address
 * @property string|null $email_id
 * @property int $addedby
 * @property string $entrydt
 * @property int $is_active
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['emp_type', 'addedby', 'entrydt'], 'required'],
            [['dob', 'doj', 'entrydt'], 'safe'],
            [['gender', 'state_id'], 'string'],
            [['addedby', 'is_active'], 'integer'],
            [['emp_id'], 'string', 'max' => 50],
            [['emp_type', 'photo', 'adhaar_card', 'adhaar_photo', 'district', 'email_id'], 'string', 'max' => 100],
            [['first_name', 'middle_name', 'last_name', 'father_name', 'mother_name', 'blood_group'], 'string', 'max' => 200],
            [['contact_no', 'alt_contact_no'], 'string', 'max' => 10],
            [['address'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emp_id' => 'Emp ID',
            'emp_type' => 'Emp Type',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'father_name' => 'Father Name',
            'mother_name' => 'Mother Name',
            'contact_no' => 'Contact No',
            'photo' => 'Photo',
            'alt_contact_no' => 'Alt Contact No',
            'dob' => 'Date of Birth',
            'doj' => 'Date of Joining',
            'gender' => 'Gender',
            'blood_group' => 'Blood Group',
            'adhaar_card' => 'Adhaar Card Number',
            'adhaar_photo' => 'Adhaar Photo',
            'state_id' => 'State',
            'district' => 'District',
            'address' => 'Address',
            'email_id' => 'Email ID',
            'addedby' => 'Addedby',
            'entrydt' => 'Entrydt',
            'is_active' => 'Is Active',
        ];
    }
}