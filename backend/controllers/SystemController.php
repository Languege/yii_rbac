<?php
namespace backend\controllers;

use Yii;

use backend\models\AdminAction;
use backend\models\AdminRole;
use backend\models\AdminUser;
use backend\models\AdminRoleUser;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;

use common\tool as ct;

class SystemController extends BaseController
{
	/**
	* 功能配置
	*
	*/
    public function actionAction()
    {	
		$query = AdminAction::find()->orderBy('id');
		$countQuery = clone $query;
    	$pages = new Pagination(['totalCount' => $countQuery->count()]);
    	$lists = $query->offset($pages->offset)
        		->limit($pages->limit)
        		->all();
        return $this->render('action', [
            'lists' => $lists,
			'pages' => $pages,
        ]);
    }

    /**
     * 功能增加修改
     * @return 
     */
    public function actionActionedit($id=0)
    {
        $action = new AdminAction();
		if ( $id > 0 ) {
			$action = AdminAction::findOne($id);
		}
		//菜单列表
		$menus = AdminAction::find()
			->where(['type' => 1])
			->orderBy(['pid' => SORT_ASC, 'myorder' => SORT_ASC])
			->all();
		return $this->render('actionedit', [
                'action' => $action,
                'menus' => $menus,
            ]);
    }

    /**
     * 功能增加修改
     * @return 
     */
    public function actionActionsave($id=0)
    {
        $model = new AdminAction();
        if ( $id > 0 ) {
            $model = AdminAction::findOne($id);
        }
        $model->load(Yii::$app->request->post(), '');
        $flag = $model->save();
        return $this->redirect(WEB_URL.'index.php?r=system/action');
    }

    /**
     * 功能删除
     * @return 
     */
    public function actionActiondel($id=0)
    {
        $model = AdminAction::findOne($id);
        $model->delete();
        return $this->redirect(WEB_URL.'admin.php?r=system/action');
    }


    /**
     * 角色配置
     * @Author   LanguageY
     * @DateTime 2017-06-12T09:32:33+0800
     * @return   [type]                   [description]
     */
    public function actionRole()
    {   
        $query = AdminRole::find()->orderBy('id');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $lists = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        return $this->render('role', [
            'lists' => $lists,
            'pages' => $pages,
        ]);
    }


    /**
     * 角色增加修改
     * @return 
     */
    public function actionRoleedit($id=0)
    {
        $role = new AdminRole();
        if ( $id > 0 ) {
            $role = AdminRole::findOne($id);
        }
        //三级功能列表
        //levelOne
        $menus = AdminAction::find()
            ->where(['pid' => 0])
            ->orderBy(['myorder' => SORT_ASC])
            ->asArray()
            ->all();

        foreach ($menus as &$menu) {
            //levelTwo
            $menu['submenu'] = AdminAction::find()
                ->where(['pid' => $menu['id']])
                ->orderBy(['myorder' => SORT_ASC])
                ->asArray()
                ->all();
            //levelThree    
            foreach ($menu['submenu'] as &$action) {
                $action['submenu'] = AdminAction::find()
                    ->where(['pid' => $action['id']])
                    ->orderBy(['myorder' => SORT_ASC])
                    ->asArray()
                    ->all();    
            }
        }

        return $this->render('roleedit', [
                'role' => $role,
                'menus' => $menus,
            ]);
    }

     /**
     * 角色增加修改
     * @return 
     */
    public function actionRolesave($id=0)
    {
        $model = new AdminRole();
        if ( $id > 0 ) {
            $model = AdminRole::findOne($id);
        }
        $post = Yii::$app->request->post();
        $model->name = $post['name'];
        $model->desc = $post['desc'];
        $model->vals = implode('|', $post['vals']);
        $model->save();
        return $this->redirect(WEB_URL.'index.php?r=system/role');
    }

    /**
     * 角色删除
     * @return 
     */
    public function actionRoledel($id=0)
    {
        $model = AdminRole::findOne($id);
        $model->delete();
        return $this->redirect(WEB_URL.'index.php?r=system/role');
    }

    /**
       * 用户列表
       *
       */
    public function actionUser()
    {   
        $query = AdminUser::find()->orderBy('id');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $lists = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();
        return $this->render('user', [
            'lists' => $lists,
            'pages' => $pages,
        ]);
    }

    /**
     * 用户修改
     * @return 
     */
    public function actionUseredit($id=0)
    {
        $user = new AdminUser();
        if ( $id > 0 ) {
            $user = Adminuser::findOne($id);
        }
        $roles = AdminRole::find()->orderBy('id')->all();
        $roleuser = AdminRoleUser::find()->where(['user_id'=>$id])->all();
        $roleuser = ArrayHelper::getColumn($roleuser, 'role_id');
        return $this->render('useredit', [
                'user' => $user,
                'roles' => $roles,
                'roleuser' => $roleuser,
            ]);
    }

    /**
     * 用户修改
     * @return 
     */
    public function actionUsersave($id=0)
    {
        $model = new AdminUser();
        $model->salt = ct\Func::randCode(11);
        if ( $id > 0 ) {
            $model = AdminUser::findOne($id);
        }
        $post = Yii::$app->request->post();
        $model->username = $post['username'];
        if (!empty($post['password'])) {
            $model->password = md5(md5($post['password']).$model->salt);
        }
        $model->save();
        //分配权限
        AdminRoleUser::deleteAll('user_id = :userid', [':userid' => $model->id]);
        foreach ($post['roles'] as $one) {
            $roleuser = new AdminRoleUser;
            $roleuser->user_id = $model->id;
            $roleuser->role_id = $one;
            $roleuser->save();
        }
        return $this->redirect(WEB_URL.'index.php?r=system/user');
    }

    /**
     * 用户删除
     * @return 
     */
    public function actionUserdel($id=0)
    {
        AdminUser::deleteAll('id='.$id);
        AdminRoleUser::deleteAll('user_id='.$id);
        return $this->redirect(WEB_URL.'index.php?r=system/user');
    }
}