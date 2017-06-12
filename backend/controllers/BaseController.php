<?php
namespace backend\controllers;

use Yii;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use backend\models\AdminAction;
use backend\models\AdminUser;
use backend\models\AdminRole;
use backend\models\AdminRoleUser;

class BaseController extends Controller
{
	 public $enableCsrfValidation = false;//屏蔽 防止csrf攻击 验证

     public $left_menus = array();

     public $role = array();

     public function beforeAction($action){
        parent::beforeAction($action);

        $menus = Yii::$app->session['left_menus'];
        if(empty($menus)){
            $menus = AdminAction::find()
                ->where(['type' => 1, 'pid' => 0])
                ->orderBy(['myorder' => SORT_ASC])
                ->asArray()
                ->all();

            foreach ($menus as &$menu) {
                $menu['submenu'] = AdminAction::find()
                    ->where(['type' => 2, 'pid' => $menu['id']])
                    ->orderBy(['myorder' => SORT_ASC])
                    ->asArray()
                    ->all();    
            }

            Yii::$app->session['left_menus'] = $menus;
        }
        
        $this->left_menus = $menus;
        //获取用户角色拥有的所有功能
        $role = Yii::$app->session['role'];
        $admin_id = Yii::$app->user->identity ? Yii::$app->user->identity->id : 0;
        if(empty($role)){
            $roles = AdminRole::find()
            ->select(['c.vals'])
            ->from(AdminUser::tableName().' a')
            ->innerJoin(AdminRoleUser::tableName().' b', 'a.id = b.user_id')
            ->innerJoin(AdminRole::tableName().' c', 'b.role_id = c.id')
            ->where(['a.id' => $admin_id])
            ->all();

            $rolevals = array();
            foreach($roles as $role) {
                $rolevals = array_merge($rolevals, explode('|', $role['vals']));
            }
            $role = array_unique($rolevals);
        }

        $this->role = $role;

        return true; 
    }


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'logins', 'error'], //允许未授权的用户访问登录
                        'allow' => true,
                    ],
                    [
                        //'actions' => ['logout', 'index'], //允许授权的用户访问这两个方法，注释后允许授权的用户访问所有方法
                        'allow' => true,       
                        'roles' => ['@'],
                    ],
                ],
            ],
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         'logout' => ['post'],
            //     ],
            // ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}