<?php

namespace app\models;

use Yii;


/**
 * This is the model class for table "members".
 *
 * @property int $mem_id
 * @property string $mem_name
 * @property string $mem_username
 * @property string $mem_email
 * @property string $mem_password
 */
class Members extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'members';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mem_name', 'mem_username', 'mem_email', 'mem_password'], 'required'],
            [['mem_name', 'mem_username', 'mem_email', 'mem_password'], 'string', 'max' => 255],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mem_name' => 'Member Name',
            'mem_username' => 'Member Username',
            'mem_email' => 'Member Email',
            'mem_password' => 'Member Password',
        ];
    }
}
