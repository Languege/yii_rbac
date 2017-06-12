<?php

namespace backend\models;

use Yii;

use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "admin_role".
 *
 * @property integer $id
 * @property string $name
 * @property string $desc
 * @property string $vals
 * @property integer $status
 */
class AdminRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['desc', 'vals'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '管理员角色ID'),
            'name' => Yii::t('app', '角色名称'),
            'desc' => Yii::t('app', '角色说明'),
            'vals' => Yii::t('app', '角色允许操作的action ID集，逗号分隔'),
            'status' => Yii::t('app', '0-正常 1-已禁用'),
        ];
    }

    public function getUsernames() 
    {
        $users = AdminUser::find()
            ->select('b.*')
            ->from(AdminRoleUser::tableName().' a')
            ->innerjoin(AdminUser::tableName().' b', 'a.user_id = b.id')
            ->where(['a.role_id' => $this->id])
            ->asArray()
            ->all();
        return implode(',', ArrayHelper::getColumn($users, 'username'));
    }
}
