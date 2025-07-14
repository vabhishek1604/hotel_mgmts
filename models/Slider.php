<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "slider".
 *
 * @property int $slid_id
 * @property string $slid_title
 * @property string $slid_desc
 * @property string $slid_url
 * @property int $slid_addedby
 * @property string $slid_entrydt
 * @property int $slid_isactive
 */
class Slider extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [['slid_title', 'slid_desc', 'slid_url', 'slid_addedby', 'slid_entrydt'], 'required'],
            [['slid_addedby', 'slid_isactive'], 'integer'],
            [['slid_entrydt'], 'safe'],
            [['slid_title'], 'string', 'max' => 100],
            [['slid_desc'], 'string', 'max' => 300],
            [['slid_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'slid_id' => 'Slid ID',
            'slid_title' => 'Title',
            'slid_desc' => 'Description',
            'slid_url' => 'Image',
            'slid_addedby' => 'Slid Addedby',
            'slid_entrydt' => 'Slid Entrydt',
            'slid_isactive' => 'Slid Isactive',
        ];
    }
    
    
    public static function get_random_image()
    {
//        $id = rand(1, 10);
        $model = Slider::find()->select('slid_url')
                ->where(['slid_isactive' => 1])
                ->orderBy(new Expression('rand()'))
                ->one();
        return $model->slid_url;
    }
}
