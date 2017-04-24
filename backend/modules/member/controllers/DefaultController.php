<?php

namespace backend\modules\member\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\Member;
use yii\web\Request;
use yii\web\View;
use backend\components\MyController;
use yii\base\Object;
use yii\web\Link;
use yii\web\Linkable;
use yii\data\Pagination;
use common\components\Utility;
use common\models\MemberSchedule;
use common\models\Facility;
use common\models\SalonMembertype;

/**
 * Default controller class
 * Member class
 *
 * @package
 * @category Member
 * @author Ha Huu Don <donhh6551@setacinq.com.vn>
 * @copyright
 * @link
 */
class DefaultController extends MyController
{

    public $enableCsrfValidation = false;

    /**
     * @Action: Index Action
     * @Description: Listmember
     * @author Ha Huu Don <donhh6551@setacinq.com.vn>
     * @date: 21/01/2014
     */
    public function actionIndex($salonId)
    {
        $salonId = (int) $salonId;
        $model = new \common\models\Member();
        $SalonMember = new \common\models\SalonMembertype();

        $limit = 10;
        $request = Yii::$app->request;

        // -----------------
        //Search
        $page = $request->Post('page');
        $page = $page < 1 ? 1 : $page;

        if (!$request->isPost) {
            // Remove special character
            $hasValidMembertypeId = false;
            $hasValidStatus = false;
            if (preg_match("/^[0-9]$/", $request->Get('membertype_id')) || $request->Get('membertype_id') == null) {
                $hasValidMembertypeId = true;
            }
            if (preg_match("/^[0-9]$/", $request->Get('status')) || $request->Get('status') == null) {
                $hasValidStatus = true;
            }
            if ($hasValidMembertypeId == true && $hasValidStatus == true) {
                $memberTypeId = $request->Get('membertype_id');
                $status = $request->Get('status');
            } else {
                $memberTypeId = '';
                $status = '';
                $limit = 0;
            }
            $value = [
                'sort' => 'asc',
                'type' => 'member_id',
                'limit' => $limit,
                'salon_membertype_id' => $memberTypeId,
                'status' => $status
            ];

            $offset = ($limit * $page) - $limit;
            $model->salon_membertype_id = $memberTypeId;
            $model->status = $status;

            $listMemberber = $model->listMemberAjaxSearch($value, $limit, $offset, $salonId);
            $listMemberbertype = $SalonMember->getMemberTypeName($salonId);
            return $this->render(
                            'index', ['listMember' => $listMemberber,
                        'listMembertype' => $listMemberbertype,
                        'model' => $model,
                        'salonId' => $salonId
            ]);
        }
        // has post data case
        $postArr = [
            'sort' => $request->Post('sort'),
            'type' => $request->Post('type'),
            'salon_membertype_id' => $request->Post('salon_membertype_id'),
            'status' => $request->Post('status')
        ];

        $offset = ($limit * $page) - $limit;

        $listMember = $model->listMemberAjaxSearch($postArr, $request->Post('total'), $offset, $salonId);
        $total = count($listMember);

        $result = '';
        if ($listMember) {
            $result = $this->renderPartial('list_order', ['listMember' => $listMember, 'salonId' => $salonId]);
        }
        echo $result;

        return;
    }

    /**
     * @Action: Detail
     * @Description: Display user information in detail
     * @author Do Ngoc Tuan <tuandn6264@setacinq.com.vn>
     */
    public function actionDetail($salonId, $memberId)
    {
        $memberId = (int) $memberId;
        $salonId = (int) $salonId;
        //Get basic infomation from table "Member" join with "salon_membertype"
        $userInfo = Member::getMemberWithSalonMembertype($memberId, $salonId);
        //If memberId is invalid
        if ($memberId == 0 || !$userInfo) {
            throw new \yii\web\HttpException(404, 'The requested Item could not be found.');
        }
        //Get facility names via salon_membetype_id
        if ($userInfo['salon_membertype_id']) {
            $facilityNames = Facility::getFacilityNameBySalonMemberType($userInfo['salon_membertype_id']);
        }

        $userInfo['facility_name'] = [];
        if (isset($facilityNames)) {
            foreach ($facilityNames as $item) {
                $userInfo['facility_name'][] = $item['facility_name'];
            }
        }
        //Get max number of field "count_monthly" in table member_schedule
        $maxNumSheduleMonthly = MemberSchedule::getMaxCountMonth($memberId, date('Y-m'));
        $userInfo['count_monthly'] = $maxNumSheduleMonthly ? $maxNumSheduleMonthly : 0;
        //Get current date in Japanese format
        $userInfo['system_date'] = Utility::getDateInJapanFormat(date('Y-m-d'));
        //Get schedule list of member today
        $memberScheduleToday = MemberSchedule::getMemberSchedule($memberId, date('Y-m-d'), 2);
        if ($memberScheduleToday) {
            $userInfo['member_schedule_today'] = $memberScheduleToday;
        }
        //Get holiday type label 
        $userInfo['holiday_type'] = array_key_exists($userInfo['holiday_type'], SalonMembertype::$holidayType) ? SalonMembertype::$holidayType[$userInfo['holiday_type']] : "";
        //Get member status label for display
        $userInfo['member_status'] = array_key_exists($userInfo['member_status'], Member::$memberStatus) ? Member::$memberStatus[$userInfo['member_status']] : "";
        //Get 3 lastest shedules of member
        $memberSchedule = MemberSchedule::getMemberSchedule($memberId, NULL, 1, 3);
        if ($memberSchedule) {
            $userInfo['member_schedule'] = $memberSchedule;
        }

        return $this->render('detail', array('data' => $userInfo));
    }

}
