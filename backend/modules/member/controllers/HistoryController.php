<?php

namespace backend\modules\member\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Member;
use yii\web\Request;
use backend\components\MyController;

/**
 * Default controller class
 * Member history class
 *
 * @package
 * @category User history
 * @author Ha Huu Don <donhh6551@setacinq.com.vn>
 * @copyright
 * @link
 */
class HistoryController extends MyController
{

    public $enableCsrfValidation = false;

    /**
     * @Action Index Action
     * @Description Member history
     * @author Ha Huu Don <donhh6551@setacinq.com.vn>
     * @date 30/01/2014
     */
    public function actionIndex($salonId, $memberId)
    {

        $memberId = (int) $memberId;
        //If meber_id or this member is not exits
        $User = \common\models\Member::getMemberWithSalonMembertype($memberId, $salonId);
        if ($memberId == 0 || !$User) {
            Yii::$app->response->redirect(array('/site/errors'));
        }

        //Get max counth_monthly for user
        $User['count_monthly'] = \common\models\MemberSchedule::getMaxCountMonth($memberId, date('Y-m'));

        $model = new \common\models\MemberAction();
        $listAll = $model->getListMemberHistory($memberId);
        
        //Get list salon_membertype
        $modelSalonType = new \common\models\SalonMembertype();
        $listSalonType = $modelSalonType->getMemberTypeName($salonId);
        
        return $this->render('index', [
                                        'listAll' => $listAll, 
                                        'User' => $User, 
                                        'valUrl' => ['memberId' => $memberId, 'salonId' => $salonId],
                                        'listSalonType' => $listSalonType
                            ]);
    }

}
