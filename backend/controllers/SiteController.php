<?php
namespace backend\controllers;

use Yii;

use backend\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends BaseController
{
   
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
         return $this->renderpartial('login');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogins()
    {
        $model = new LoginForm();
      
        if ($model->load(Yii::$app->request->post(), '') && $model->login()) {
            return $this->goBack();
        } else {
            return $this->renderpartial('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
