<?php

namespace frontend\components;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\models\Member;
use common\models\Salon;

class MyController extends Controller
{

    public function myBehaviors()
    {
        
    }

    public function behaviors()
    {
        $defaultAccessRules = [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        //'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];

        if (!empty($this->accessRules)) {
            $defaultAccessRules = array_merge_recursive($this->myBehaviors(), $defaultAccessRules);
        }

        return $defaultAccessRules;
    }
    
    public function init()
    {
        if (!\Yii::$app->user->isGuest) {
            $member = Member::findOne(Yii::$app->user->identity->member_id);
            $salon = Salon::findOne($member->salon_id);
            Yii::$app->params['salonName'] = @$salon->salon_name;
            Yii::$app->params['salonId'] = @$salon->salon_id;
        }
    }

}