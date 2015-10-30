<?php

namespace backend\components;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\widgets\Breadcrumbs;
use backend\components\MyController;
use common\models\Salon;
use common\models\SalonGroup;
use yii\db\Expression;
use yii\helpers\Url;

class MyController extends Controller
{
    public function MyBehaviors()
    {

    }

    public function behaviors()
    {

        $defaultAccessRules = [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'logout' => ['post'],
                ],
            ],
        ];

        if (!empty($this->accessRules)) {
            $defaultAccessRules = array_merge_recursive($this->MyBehaviors(), $defaultAccessRules);
        }

        return $defaultAccessRules;
    }

}
