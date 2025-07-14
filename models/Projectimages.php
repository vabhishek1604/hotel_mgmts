<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "project_images".
 *
 * @property int $pimg_id
 * @property int $pimg_projid
 * @property int $pimg_propid
 * @property string $pimg_type
 * @property string $pimg_url
 * @property int $pimg_addedby
 * @property string $pimg_entrydt
 * @property int $pimg_isactive
 *
 * @property Project $pimgProj
 * @property ProjectAvailabilities $pimgProp
 */
class Projectimages extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pimg_propid', 'pimg_type'], 'required'],
            [['pimg_projid', 'pimg_propid', 'pimg_addedby', 'pimg_isactive'], 'integer'],
            [['pimg_type'], 'string'],
            [['pimg_entrydt'], 'safe'],
            //            [['pimg_url'], 'string', 'max' => 255],
            ['pimg_url', 'image', 'minWidth' => 1080, 'maxWidth' => 1080, 'minHeight' => 450, 'maxHeight' => 450, 'extensions' => 'jpg, gif, png', 'maxSize' => 1024 * 1024 * 2],
            [['pimg_projid'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['pimg_projid' => 'proj_id']],
            [['pimg_propid'], 'exist', 'skipOnError' => true, 'targetClass' => ProjectAvailabilities::className(), 'targetAttribute' => ['pimg_propid' => 'avail_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pimg_id' => 'Pimg ID',
            'pimg_projid' => 'Pimg Projid',
            'pimg_propid' => 'Pimg Propid',
            'pimg_type' => 'Image Type',
            'pimg_url' => 'Image  Url',
            'pimg_addedby' => 'Pimg Addedby',
            'pimg_entrydt' => 'Pimg Entrydt',
            'pimg_isactive' => 'Pimg Isactive',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getPimgProj()
    {
        return $this->hasOne(Project::className(), ['proj_id' => 'pimg_projid']);
    }

    /**
     * @return ActiveQuery
     */
    public function getPimgProp()
    {
        return $this->hasOne(Projectavailabilities::className(), ['avail_id' => 'pimg_propid']);
    }


    public static function get_random_image($limit = '', $project_id = '', $img_type = 'Main')
    {
        //        $id = rand(1, 10);
        $addon_condition = array();
        $condition       = array('pimg_isactive' => 1, 'pimg_type' => $img_type);
        if (!empty($project_id)) {
            $condition['pimg_propid'] = $project_id;
        }
        if ($limit == '') {
            $model = Projectimages::find()->select('pimg_url')
                ->where($condition)
                ->orderBy(new Expression('rand()'))
                ->one();
            return (!empty($model)) ? $model->pimg_url : '';
        } else {
            return $query = Projectimages::find()->select('pimg_url')
                ->where($condition)
                ->orderBy(new Expression('rand()'))
                ->limit($limit)->all();
        }
    }
}