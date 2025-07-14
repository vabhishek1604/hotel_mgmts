<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sara_images".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $image
 */
class Saraimages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sara_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description', 'image'], 'string'],
            [['title'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Image Title',
            'description' => 'Image Description',
            'image' => 'Add Image',
        ];
    }
}
