<?php

namespace backend\modules\member\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\Controller;
use backend\components\MyController;
use yii\db\Expression;
use common\models\Member;
use common\models\MemberSchedule;

/*
 * Salon History Controller
 * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
 */

class SalonhistoryController extends MyController
{
    /*
     * Action Index
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function actionIndex($salonId, $memberId)
    {
        //If meber_id or this member is not exits
        $User = Member::getMemberWithSalonMembertype($memberId, $salonId);
        if ($memberId == 0 || !$User) {
            Yii::$app->response->redirect(array('/site/errors'));
        }
        
        $listSchedule = MemberSchedule::getMemberScheduleWithSalon($memberId, 'desc');
        
        //Get max counth_monthly for user
        $User['count_monthly'] = \common\models\MemberSchedule::getMaxCountMonth($memberId, date('Y-m'));
        
        return $this->render('index', [
                        'User' => $User, 
                        'listSchedule' => $listSchedule,
                        'salonId' => $salonId,
                        'memberId' => $memberId
                    ]);
    }

}