<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property int $emp_id
 * @property int $comp_id
 * @property string $username
 * @property string $password
 * @property string $activation_code
 * @property string $forgotten_password_code
 * @property string $forgotten_password_time
 * @property string $role
 * @property string $authKey
 * @property string $accessToken
 * @property string $mobile
 * @property string $email
 * @property string $ip_address
 * @property string $created_on
 * @property string $last_login
 * @property int $active
 * @property int $is_password_update
 * @property int $is_security_update
 *
 * @property Hospitals $hospital
 * @property Employee $emp
 */
class Users extends ActiveRecord implements IdentityInterface
{

    const ROLE_USER = 'user';
    const ROLE_MODERATOR = 'staff';
    const ROLE_ADMIN = 'admin';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'role'], 'required'],
            [['emp_id', 'comp_id', 'forgotten_password_time', 'last_login', 'is_password_update', 'is_security_update'], 'integer'],
            [['role'], 'string'],
            [['created_on'], 'safe'],
            [['username', 'authKey', 'accessToken'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 255],
            [['activation_code', 'forgotten_password_code'], 'string', 'max' => 40],
            [['ip_address'], 'string', 'max' => 15],
            [['active'], 'string', 'max' => 1],
            //[['comp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hospitals::className(), 'targetAttribute' => ['comp_id' => 'id']],
            [['emp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['emp_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emp_id' => 'Employee',
            'comp_id' => 'Company',
            'username' => 'Username',
            'password' => 'Password',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'activation_code' => 'Activation Code',
            'forgotten_password_code' => 'Forgotten Password Code',
            'forgotten_password_time' => 'Forgotten Password Time',
            'role' => 'Role',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'ip_address' => 'Ip Address',
            'created_on' => 'Created On',
            'last_login' => 'Last Login',
            'active' => 'Active',
            'is_password_update' => 'Is Password Update',
            'is_security_update' => 'Is Security Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'comp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmp()
    {
        return 1; //$this->hasOne(Employee::className(), ['id' => 'emp_id']);
    }

    public static function primaryKey()
    {
        return ['id'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public static function getCompanyId()
    {
        return self::findOne(['id' => Yii::$app->user->id])->comp_id;
    }
    public static function getUsername()
    {
        return self::findOne(['id' => Yii::$app->user->id])->username;
    }

    public static function getGroup()
    {
        $data = [];
        foreach (Usersgroups::findAll(['user_id' => Yii::$app->user->id]) as $usergroup) {
            $group = Groups::findOne(['id' => $usergroup->group_id])->group_name;
            array_push($data, $group);
        }
        return $data;
    }

    // public static function getGroupDetail($column,$id) {
    // $group = Groups::findOne(['id' => $id])->$column;
    // return $group;
    // }

    public function isAdmin()
    {
        $userrole = self::findOne(['id' => Yii::$app->user->id])->role;
        if ($userrole == 'admin') return 'admin';
    }

    public static function getRole()
    {
        return self::findOne(['id' => Yii::$app->user->id])->role;
    }

    public function getStatus()
    {
        return self::findOne(['id' => Yii::$app->user->id])->status;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey = $authKey;
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \yii\base\NotSupportedException();
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username, 'active' => 1]);
        //return new static($dbUser);
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function checkStatus($status)
    {
        return $this->status === $status;
    }

    public function setPassword($pwd)
    {
        return $this->password = $pwd;
    }

    public function validateRole($role)
    {
        return $this->role === $role;
    }
    public static function userId()
    {
        $user = self::findOne(Yii::$app->user->id);
        return $user['id'];
    }

    public static function log()
    {
        \Yii::info('blah blah', 'my_category');
        \Yii::warning('blah blah', 'my_category');
    }

    public static function toSlug($str, $replace = array(), $delimiter = '-')
    {
        if (!empty($replace)) {
            $str = str_replace((array) $replace, ' ', $str);
        }
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
        return $clean;
    }

    public static function submit_post($url, $post_data)
    {
        $timeout = 0;
        $url = str_replace("&amp;", "&", urldecode(trim($url)));

        //     $cookie = tempnam("/tmp", "CURLCOOKIE");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, selfmb_rawurlencode($post_data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1");
        curl_setopt($ch, CURLOPT_URL, $url);
        //    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie);

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    # required for https urls
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        $content = curl_exec($ch);
        $response = curl_getinfo($ch);
        curl_close($ch);

        if ($response['http_code'] == 301 || $response['http_code'] == 302) {
            ini_set("user_agent", "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1");

            if ($aheaders = get_aheaders($response['url'])) {
                foreach ($aheaders as $value) {
                    if (substr(strtolower($value), 0, 9) == "location:")
                        return get_url(trim(substr($value, 9, strlen($value))));
                }
            }
        }

        if ((preg_match("/>[[:space:]]+window\.location\.replace\('(.)'\)/i", $content, $value) || preg_match("/>[[:space:]]+window\.location\=\"(.)\"/i", $content, $value)) &&
            $javascript_loop < 5
        ) {
            return get_url($value[1], $javascript_loop + 1);
        } else {
            return array($content, $response);
        }
    }
}