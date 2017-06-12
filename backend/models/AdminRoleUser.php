<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin_role_user".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $role_id
 * @property integer $add_time
 */
class AdminRoleUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_role_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'role_id', 'add_time'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '用户角色ID'),
            'user_id' => Yii::t('app', '用户ID'),
            'role_id' => Yii::t('app', '角色ID'),
            'add_time' => Yii::t('app', '添加时间'),
        ];
    }
}
