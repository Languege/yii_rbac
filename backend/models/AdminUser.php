<?php

namespace backend\models;

use Yii;

use yii\web\IdentityInterface;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "admin_user".
 *
 * @property integer $id
 * @property string $user_name
 * @property integer $type
 * @property string $password
 * @property string $salt
 * @property integer $create_time
 */
class AdminUser extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'create_time'], 'integer'],
            [['username'], 'string', 'max' => 255],
            [['password'], 'string', 'max' => 100],
            [['salt'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '管理员用户ID'),
            'username' => Yii::t('app', '用户名'),
            'type' => Yii::t('app', '类型'),
            'password' => Yii::t('app', '密码'),
            'salt' => Yii::t('app', '加密盐'),
            'create_time' => Yii::t('app', '创建时间'),
        ];
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password, $salt = '')
    {
        if (empty($salt)) {
            return $this->password == md5($password);
        }
        return $this->password == md5(md5($password).$salt);
    }

    public function getRoles() 
    {
        $roles = AdminRole::find()
            ->select(['*'])
            ->from(AdminRoleUser::tableName().' a')
            ->innerjoin(AdminRole::tableName().' b', 'a.role_id = b.id')
            ->where(['a.user_id' => $this->id])
            ->all();
        return implode(',', ArrayHelper::getColumn($roles, 'name'));
    }

    public static function findIdentity($id){
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null){

    }

    public function getId(){
        return $this->id;
    }


    public function getAuthKey(){

    }

    public function validateAuthKey($authKey){

    }
}
