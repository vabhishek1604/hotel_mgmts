<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property int $user_id
 * @property string $company_name
 * @property string $company_title
 * @property string $company_desc
 * @property string $company_gstin
 * @property string $company_logo
 * @property string $company_favicon
 * @property string $company_logo_lg
 * @property string $company_address
 * @property int $comp_state_id
 * @property string $website_url
 * @property string $official_email_id
 * @property string $support_mail
 * @property string $contact_number
 * @property string $company_facebook
 * @property string $company_twitter
 * @property string $company_linkedin
 * @property string $company_skype
 * @property int $item_alloted_superadmin
 * @property int $is_running
 * @property int $is_active
 * @property int $created_by
 * @property string $created_at
 * @property int $updated_by
 * @property string $updated_at
 *
 * @property Users $user
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'comp_state_id', 'item_alloted_superadmin', 'is_running', 'is_active', 'created_by', 'updated_by'], 'integer'],
            [['company_name', 'company_title'], 'required'],
            [['company_desc', 'company_favicon'], 'string'],
            [['created_at', 'updated_at', 'company_favicon', 'company_facebook', 'company_twitter', 'company_linkedin', 'company_skype'], 'safe'],
            [['company_name', 'company_facebook', 'company_twitter', 'company_linkedin', 'company_skype'], 'string', 'max' => 255],
            [['company_gstin', 'company_title', 'company_logo', 'company_logo_lg'], 'string', 'max' => 100],
            [['company_address', 'website_url', 'official_email_id', 'support_mail'], 'string', 'max' => 150],
            [['contact_number'], 'string', 'max' => 20],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'company_name' => 'Company Name',
            'company_title' => 'About Company Short',
            'company_desc' => 'About Company Deccription',
            'company_gstin' => 'Company Gstin',
            'company_logo' => 'Company Logo',
            'company_favicon' => 'Company Favicon',
            'company_logo_lg' => 'Company Logo Lg',
            'company_address' => 'Company Address',
            'comp_state_id' => 'Comp State ID',
            'website_url' => 'Website Url',
            'official_email_id' => 'Official Email ID',
            'support_mail' => 'Support Mail',
            'contact_number' => 'Contact Number',
            'company_facebook' => 'Facebook Id',
            'company_twitter' => 'Twitter Id',
            'company_linkedin' => 'Linkedin Id',
            'company_skype' => 'Skype Id',
            'item_alloted_superadmin' => 'Item Alloted Superadmin',
            'is_running' => 'Is Running',
            'is_active' => 'Is Active',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    public static function getCompanyData($column)
    {
        $model = Company::find()->select($column)->where(['is_active' => 1])->orderBy(['id' => SORT_DESC])->one();
        return $model->$column;
    }
}