<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use backend\components\MyController;
use yii\helpers\Url;
use common\models\AdminInfo;
use common\models\SalonMembertype;
use common\models\MemberSchedule;

/**
 * Site controller
 */
class SiteController extends MyController
{
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

    public function actionIndex($salonId = 0)
    {
        Yii::$app->view->title = 'Free software download ｜ Admin system';
        
        
        return $this->render('index');
    }

    public function actionErrors()
    {
        throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
    }

}
