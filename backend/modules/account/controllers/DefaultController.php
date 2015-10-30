<?php

namespace app\modules\account\controllers;

use Yii;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use backend\components\MyController;

class DefaultController extends MyController
{

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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Get login
     *
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     * @return object render view
     */
    public function actionLogin()
    {
        $this->layout = false;

        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        //\common\components\Utility::debugData(Yii::$app->request->post());
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        } else {
            $model->password = '';
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Get logout
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     * @return redirect
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}