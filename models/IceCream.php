<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ice_cream".
 *
 * @property int $id
 * @property string $flavour
 * @property string $type
 * @property string $quantity
 */
class IceCream extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ice_cream';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['flavour', 'type', 'quantity', 'remark'], 'required'],
            [['flavour', 'type', 'remark'], 'string'],
            [['quantity'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'flavour' => 'Flavour',
            'type' => 'Type',
            'quantity' => 'Quantity',
            'remark' => 'Remark',
        ];
    }
}