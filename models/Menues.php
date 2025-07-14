<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menues".
 *
 * @property int $menu_id
 * @property string $menu_pos
 * @property string $menu_title
 * @property int $menu_level
 * @property int $menu_parent
 * @property int $menu_order
 * @property string $menu_linktype
 * @property string $menu_pageurl
 * @property int $menu_status
 *
 * @property PageContent[] $pageContents
 */
class Menues extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menues';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_pos', 'menu_title', 'menu_level', 'menu_parent', 'menu_order', 'menu_linktype', 'menu_pageurl'], 'required'],
            [['menu_level', 'menu_parent', 'menu_order', 'menu_status'], 'integer'],
            [['menu_linktype'], 'string'],
            [['menu_pos'], 'string', 'max' => 10],
            [['menu_title', 'menu_pageurl'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => 'Menu ID',
            'menu_pos' => 'Menu Pos',
            'menu_title' => 'Menu Title',
            'menu_level' => 'Menu Level',
            'menu_parent' => 'Menu Parent',
            'menu_order' => 'Menu Order',
            'menu_linktype' => 'Menu Linktype',
            'menu_pageurl' => 'Menu Pageurl',
            'menu_status' => 'Menu Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageContents()
    {
        return $this->hasMany(PageContent::className(), ['cont_menuid' => 'menu_id']);
    }
}
