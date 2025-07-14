<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "testimonials".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $content
 * @property string|null $image
 * @property int|null $isactive
 */
class Testimonials extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'testimonials';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content',], 'required'],
            [['content'], 'string'],
            [['isactive'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Name',
            'content' => 'Content',
            'image' => 'Add Image',
            'isactive' => 'Isactive',
        ];
    }
}
