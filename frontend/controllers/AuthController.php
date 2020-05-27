<?php

namespace frontend\controllers;

use common\models\SignupForm;
use common\models\LoginForm;
use common\models\User;
use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(Yii::$app->request->hostInfo.'/projects/mon_con/frontend/web/index.php/counter/index');
        }
        Yii::error($model);
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(Yii::$app->request->hostInfo.'/projects/mon_con/frontend/web/index.php/counter/index');
    }


    public function actionSignup()
    {
        $model = new SignupForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->signup())
            {
                return $this->redirect(['auth/login']);
            }
        }

        return $this->render('signup', ['model'=>$model]);
    }

    public function actionLoginVk($uid, $first_name, $photo)
    {
        $this->layout = 'counter';
        $user = new User();
        if($user->saveFromVk($uid, $first_name, $photo))
        {
            return $this->redirect(['counter/index']);
        }
    }

    public function actionTest()
    {
        $user = User::findOne(1);

        Yii::$app->user->logout();

        if(Yii::$app->user->isGuest)
        {
            echo 'Пользователь гость';
        }
        else
        {
            echo 'Пользователь Авторизован';
        }
    }
}