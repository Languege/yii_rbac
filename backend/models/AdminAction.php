<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin_action".
 *
 * @property integer $id
 * @property integer $type
 * @property string $sign
 * @property string $name
 * @property integer $pid
 * @property integer $myorder
 * @property string $url
 */
class AdminAction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin_action';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'pid', 'myorder'], 'integer'],
            [['sign', 'name', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'action功能ID'),
            'type' => Yii::t('app', '类型'),
            'sign' => Yii::t('app', '签名'),
            'name' => Yii::t('app', '功能名称'),
            'pid' => Yii::t('app', '父模块ID'),
            'myorder' => Yii::t('app', '展示顺序'),
            'url' => Yii::t('app', '跳转链接'),
        ];
    }

    public function getPidname()
    {
        return $this->hasOne(AdminAction::className(), ['id' => 'pid']);
    }
}
