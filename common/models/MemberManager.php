<?php

namespace common\models;

use Yii;
use common\models\Member;
use common\models\MemberAction;
use yii\db\Expression;

/*
 * Member Manager model
 * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
 */

class MemberManager extends \yii\db\ActiveRecord
{
    /*
     * save data for Member
     *
     * @since : 10/02/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */

    public function saveData($member, $salonId)
    {
        // transaction開始
        try
        {
            $transaction = self::getDb()->beginTransaction();

            $action = '';
            if(!isset($member->member_id)) {
                //add member action
                $memberActionModel = new MemberAction();
                $memberActionModel->salon_id = $salonId;
                $memberActionModel->action_type = 10;
                $memberActionModel->status = 2;
                $memberActionModel->receipt_datetime = new \yii\db\Expression('NOW()');
                $memberActionModel->resume_date = new \yii\db\Expression('NOW()');
                $memberActionModel->reg_datetime = new \yii\db\Expression('NOW()');

                $action = 'add';
            }
            else {
                $oldData = Member::findOne($member->member_id);
                if ($oldData->pos_member_cd != $member->pos_member_cd) {
                    //add member action
                    $memberActionModel = new MemberAction();
                    $memberActionModel->member_id = $member->member_id;
                    $memberActionModel->salon_id = $salonId;
                    $memberActionModel->action_type = 999;
                    $memberActionModel->status = 2;
                    $memberActionModel->pos_member_cd = $member->pos_member_cd;
                    $memberActionModel->pos_member_cd_OLD = $oldData->pos_member_cd;
                    $memberActionModel->receipt_datetime = new \yii\db\Expression('NOW()');
                    $memberActionModel->resume_date = new \yii\db\Expression('NOW()');
                    $memberActionModel->reg_datetime = new \yii\db\Expression('NOW()');

                    $memberActionModel->save();
                }


                if ($oldData->salon_membertype_id != $member->salon_membertype_id) {
                    //add member action
                    $memberActionModel = new MemberAction();
                    $memberActionModel->member_id = $member->member_id;
                    $memberActionModel->salon_id = $salonId;
                    $memberActionModel->action_type = 10;
                    $memberActionModel->status = 0;
                    $memberActionModel->salon_membertype_id_NEXT = $member->salon_membertype_id;
                    $memberActionModel->salon_membertype_id = $oldData->salon_membertype_id;
                    $memberActionModel->receipt_datetime = new \yii\db\Expression('NOW()');
                    $memberActionModel->resume_date = date("Y-m-d", mktime(0, 0, 0, $member->createMonth, $member->createDay, $member->createYear));
                    $memberActionModel->reg_datetime = new \yii\db\Expression('NOW()');

                    $memberActionModel->save();

                }
            }

            $member->upd_datetime = new \yii\db\Expression('NOW()');
            $member->save();

            if ($action == 'add') {
                $memberActionModel->member_id = $member->member_id;
                $memberActionModel->save();
            }

            $transaction->commit();
            return true;
        } catch(Exception $e) {
            $transaction->rollBack();
            return false;
        }
    }

}
