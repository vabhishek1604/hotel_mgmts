<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "all_states".
 *
 * @property int $st_id
 * @property string $st_name
 * @property int $st_code
 */
class AllStates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'all_states';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['st_name', 'st_code'], 'required'],
            [['st_code'], 'integer'],
            [['st_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'st_id' => 'ID',
            'st_name' => 'State Name',
            'st_code' => 'State Code',
        ];
    }
}
