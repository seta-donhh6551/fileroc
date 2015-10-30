<?php

namespace backend\modules\member\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Member;
use yii\web\Request;
use common\components\Utility;
use backend\components\MyController;

/**
 * Input Member history class
 *
 * @package
 * @category User history
 * @author Ha Huu Don <donhh6551@setacinq.com.vn>
 * @copyright
 * @link
 */
class HistoryinputController extends MyController
{

    public $enableCsrfValidation = false;

    /*
     * History Input Add
     *
     * @since 08/02/2015
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function actionIndex($salonId, $memberId, $process, $memberActionId = null)
    {
        $model = $this->loadModel($memberActionId);
        $salonMemberType = new \common\models\SalonMembertype();
        
        $User = \common\models\Member::getMemberWithSalonMembertype($memberId, $salonId);
        //If meber_id or this member is not exits or member_id without salonid
        if ($memberId == NULL || !$User) { //member_id
            Yii::$app->response->redirect(array('/site/errors'));
        }
        
        $request = Yii::$app->request;
        
        if ($request->isPost && $request->Post('pos-submit')) {
            $post = $request->Post('MemberAction');
            
            $model->setRule($post['action_type']);
            $model->resume_date = Utility::formarInputDate($post['fukukaiYear'], $post['fukukaiMonth'], $post['fukukaiDay']);
            $model->receipt_datetime = Utility::formarInputDate($post['createYear'], $post['createMonth'], $post['createDay']).' '.date('H:i:s');
            $createDay = date('Y-m-d',  strtotime($model->receipt_datetime));
             
            //Set rule validation
            switch ($post['action_type']) {
                case 10 : 
                            // Update receipt_datetime
                    break;
                case 20 : 
                            $model->salon_membertype_id_NEXT = $post['salon_membertype_id_NEXT'];
                    break;
                case 30 : 
                            $model->comeback_date = Utility::formarInputDate($post['suspendedYear'], $post['suspendedMonth'], $post['suspendedDay']);
                    break;
                case 90 : 
                            $model->resume_date = Utility::formarInputDate($post['withdrewYear'], $post['withdrewMonth'], $post['withdrewDay']);
                    break;
                case 999 : 
                            $model->pos_member_cd = $post['poscd1'].$post['poscd2'].$post['poscd3'];
                    break;
            }
            
            $model->attributes = $request->Post('MemberAction');
            if ($model->validate()) {
                $model->member_id = $memberId;
                $model->salon_id = $salonId;
                $model->admin_id = Yii::$app->user->identity->admin_id;
                $model->salon_membertype_id = $User['salon_membertype_id'];
                $model->pos_member_cd_OLD = $User['pos_member_cd'];
                $model->status = 0;
                $model->reason = $post['reason'];
                $model->upd_datetime = new \yii\db\Expression('NOW()');
//                var_dump($model);
                //$model->receipt_datetime = Utility::formarInputDate($post['createYear'], $post['createMonth'], $post['createDay']).' '.date('H:i:s');
//                die('aa');
//                $model->save();
//                Yii::$app->response->redirect(array('/member/user_history/category_edit_complete/'.$salonId.'/'.$memberId));
            }
        }
        //Get max counth_monthly for user
        $User['count_monthly'] = \common\models\MemberSchedule::getMaxCountMonth($memberId, date('Y-m'));

        return $this->render('/history/input', [
                                    'model' => $model, 
                                    'User' => $User,
                                    'actionType' => $process,
                                    'valUrl' => ['memberId' => $memberId, 'salonId' => $salonId, 'memberActionId' => $memberActionId],
                                    'salonMemberType' => $salonMemberType->getMemberTypeName($salonId)
                            ]);
    }
    
    /*
     * Function loadModel
     *
     * @since 12/02/2015
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function loadModel($memberActionId = null)
    {
        $memberAction = new \common\models\MemberAction();
        $model = \common\models\MemberAction::findOne($memberActionId);
        
        if($model != null){
            $memberAction = $model;
        }
        
        return $memberAction;
    }
    
    /*
     * Member History Complete
     *
     * @since 09/02/2015
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function actionComplete($salonId, $memberId)
    {
        $model = new \common\models\MemberAction();
        
        $User = \common\models\Member::getMemberWithSalonMembertype($memberId, $salonId);
        //If $memberActionId or this member is not exits
        if (!$User) { //member_id
            Yii::$app->response->redirect(array('/site/errors'));
        }
        
        return $this->render('/history/complete', ['salonId'=>$salonId, 'User' => $User, 'memberId'=>$memberId]);
    }
    
    /*
     * Member History Canceled
     *
     * @since 09/02/2015
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     */
    public function actionCanceled($salonId, $memberId)
    {
        $model = new \common\models\MemberAction();
        
        $User = \common\models\Member::getMemberWithSalonMembertype($memberId, $salonId);
        //If $memberActionId or this member is not exits
        if (!$User) { //member_id
            Yii::$app->response->redirect(array('/site/errors'));
        }
        
        return $this->render('/history/canceled', ['salonId'=>$salonId, 'User'=>$User, 'memberId'=>$memberId]);
    }
}