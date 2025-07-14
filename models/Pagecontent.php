<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "page_content".
 *
 * @property int $cont_id
 * @property int $cont_menuid
 * @property int $cont_order
 * @property string $cont_title
 * @property string $cont_desc
 * @property string $cont_image
 * @property string $cont_entrydt
 * @property int $cont_status
 *
 * @property Menues $contMenu
 */
class Pagecontent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cont_menuid', 'cont_order', 'cont_title'], 'required'],
            [['cont_menuid', 'cont_order', 'cont_status'], 'integer'],
            [['cont_order'], 'unique'],
//            ['cont_desc', 'required', 'when' => function($model) { return empty($model->cont_image); }],
//            ['cont_image', 'required', 'when' => function($model) { return empty($model->cont_desc); }],
            [['cont_desc'], 'string'],
            [['cont_entrydt'], 'safe'],
            [['cont_title', 'cont_image'], 'string', 'max' => 255],
            [['cont_menuid'], 'exist', 'skipOnError' => true, 'targetClass' => Menues::className(), 'targetAttribute' => ['cont_menuid' => 'menu_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cont_id' => 'Cont ID',
            'cont_menuid' => 'Cont Menuid',
            'cont_order' => 'Cont Order',
            'cont_title' => 'Cont Title',
            'cont_desc' => 'Cont Desc',
            'cont_image' => 'Cont Image',
            'cont_entrydt' => 'Cont Entrydt',
            'cont_status' => 'Cont Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContMenu()
    {
        return $this->hasOne(Menues::className(), ['menu_id' => 'cont_menuid']);
    }
}
