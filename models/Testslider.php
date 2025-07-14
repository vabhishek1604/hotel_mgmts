<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_slider".
 *
 * @property int $id
 * @property string $slid_title
 * @property string $slid_desc
 * @property string $slid_url
 * @property int $slid_addedby
 * @property string $slid_entrydt
 * @property int $slid_isactive
 */
class Testslider extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test_slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slid_title', 'slid_url', 'slid_addedby',], 'required'],
            [['slid_isactive'], 'integer'],
            [['slid_addedby', 'slid_entrydt','slide_image'], 'safe'],
            [['slid_title'], 'string', 'max' => 100],
            [['slid_desc', 'slid_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'SLIDE ID',
            'slid_title' => 'SLIDE TITLE',
            'slid_desc' => 'SLIDE DESCRIPTION',
            'slid_url' => 'ADD SLIDE URL',
            'slid_addedby' => 'SLIDE ADDED BY',
            'slid_entrydt' => 'SLIDE ENTRY DATE',
            'slid_isactive' => 'SLIDE IS ACTIVE',
            'slide_image' => 'SELECT IMAGE',
        ];
    }
}
