<?php

namespace backend\modules\member\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\helpers\Url;
use backend\components\MyController;
use common\models\SalonOpen;
use common\models\RMemberSalonFacility;
use common\models\UserAddForm;
use common\models\SalonBookingForm;
use common\models\Member;
use common\models\Facility;
use common\models\MemberSchedule;
use vendor\calendar\classes\Calendar;
use yii\db\Expression;

/*
 * ReservationController
 * @author Nguyen binh nguyen <nguyennb6390@seta-asia.com.vn>
 */

class ReservationController extends MyController
{
    /*
     * booking add
     * @param int $salonId, int $memberId
     * @author Nguyen binh nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function actionAdd($salonId = null, $memberId = null)
    {
        $memberModel = new Member();
        $infoBooking = $memberModel->getInfoBooking($memberId);

        $gender = @$infoBooking['gender'];
        $salonMemberTypeId = @$infoBooking['salon_membertype_id'];
        //get count month by member_id
        $maxCountMonth = MemberSchedule::getMaxCountMonth($memberId, date('Y-m'));
        $maxCountMonth = @$maxCountMonth['maxVal'];

        $salonBookingForm = new SalonBookingForm();
        $providerFacilityList = $salonBookingForm->providerFacilityList($salonId, $salonMemberTypeId, $getOther = false, $gender);
        $providerFacilityListOther = $salonBookingForm->providerFacilityList($salonId, $salonMemberTypeId, $getOther = true, $gender);

        if (Yii::$app->request->isPost) {
            $dataPost = Yii::$app->request->Post();
            $successFlag = $salonBookingForm->addData($salonId, $memberId, $salonMemberTypeId, $dataPost, $infoBooking, $maxCountMonth, $gender);
            if ($successFlag) {
                $this->redirect(Url::to(['/member/reservation/complete', 'salonId' => $salonId, 'memberId' => $memberId]));
            }
        }

        return $this->render('add', [
                    'salonId' => $salonId,
                    'memberId' => $memberId,
                    'infoBooking' => $infoBooking,
                    'maxCountMonth' => $maxCountMonth,
                    'providerFacilityList' => $providerFacilityList,
                    'providerFacilityListOther' => $providerFacilityListOther,
                    'salonBookingForm' => $salonBookingForm
                        ]
        );
    }

    /*
     * booking edit
     * @param int $salonId, $memberId, $memberScheduleId
     * @author Nguyen binh nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function actionEdit($salonId = null, $memberId = null, $memberScheduleId = null)
    {
        $memberModel = new Member();
        $salonBookingForm = new SalonBookingForm();
        $rMemberSalonFacility = new RMemberSalonFacility();
        $infoBooking = $memberModel->getInfoBooking($memberId);

        $gender = @$infoBooking['gender'];
        $salonMemberTypeId = @$infoBooking['salon_membertype_id'];
        //get count month by member_id
        $memberScheduleModel = new MemberSchedule();
        $maxCountMonth = $memberScheduleModel->getMaxCountMonth($memberId);
        $maxCountMonth = @$maxCountMonth['maxVal'];
        $memberScheduleDetail = $memberScheduleModel->getById($memberScheduleId);

        $providerFacilityList = $salonBookingForm->providerFacilityList($salonId, $salonMemberTypeId, $getOther = false, $gender);
        $providerFacilityListOther = $salonBookingForm->providerFacilityList($salonId, $salonMemberTypeId, $getOther = true, $gender);

        //set data into form edit
        $year = date("Y", strtotime($memberScheduleDetail['start_datetime']));
        $month = date("m", strtotime($memberScheduleDetail['start_datetime']));
        $day = date("d", strtotime($memberScheduleDetail['start_datetime']));
        $hourStart = date("H", strtotime($memberScheduleDetail['start_datetime']));
        $hourEnd = date("H", strtotime($memberScheduleDetail['end_datetime']));
        $minuteStart = date("i", strtotime($memberScheduleDetail['start_datetime']));
        $minuteEnd = date("i", strtotime($memberScheduleDetail['end_datetime']));
        $range = ($hourEnd - $hourStart) * 60 + ($minuteEnd - $minuteStart);

        $timeBooking = array(
            'year' => $year,
            'month' => $month + 0,
            'day' => $day + 0,
            'hour' => $hourStart,
            'minute' => $minuteStart,
            'range' => $range,
        );

        //get facility booked
        $facilityBookedObj = $rMemberSalonFacility->getFacilityBooked($memberScheduleId);
        $facilitySelected = array();
        foreach ($facilityBookedObj as $key => $value) {
            $facilitySelected[] = $value['facility_id'];
        }
        $salonBookingForm->timeBooking = $timeBooking;
        $salonBookingForm->facility = $facilitySelected;
        $salonBookingForm->facilityOther = $facilitySelected;

        if (Yii::$app->request->isPost) {
            $dataPost = Yii::$app->request->Post();
            $param = [
                'salonId' => $salonId,
                'memberId' => $memberId,
                'memberScheduleId' => $memberScheduleId,
                'dataPost' => $dataPost,
                'salonMemberTypeId' => $salonMemberTypeId,
                'maxCountMonth' => $maxCountMonth,
                'infoBooking' => $infoBooking,
                'timeBooking' => $timeBooking,
                'facilitySelected' => $facilitySelected,
                'gender' => $gender,
            ];
            $successFlag = $salonBookingForm->editData($param);
            if ($successFlag) {
                $this->redirect(Url::to(['/member/reservation/complete', 'salonId' => $salonId, 'memberId' => $memberId]));
            }
        }

        //set param and template
        return $this->render('add', [
                    'salonId' => $salonId,
                    'memberId' => $memberId,
                    'memberScheduleId' => $memberScheduleId,
                    'infoBooking' => $infoBooking,
                    'maxCountMonth' => $maxCountMonth,
                    'providerFacilityList' => $providerFacilityList,
                    'providerFacilityListOther' => $providerFacilityListOther,
                    'salonBookingForm' => $salonBookingForm
                        ]
        );
    }

    /*
     * booking cancel
     * @author Nguyen binh nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function actionCancel($salonId = null, $memberId= null, $memberScheduleId = null)
    {
        Yii::$app->layout = false;
        //update status cancel member schedule
        MemberSchedule::cancel($memberScheduleId);
        $this->redirect(Url::to(['/member/default/detail', 'salonId' => $salonId, 'memberId' => $memberId]));
    }

    /*
     * booking complete
     * @author Nguyen binh nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function actionComplete($salonId = null, $memberId = null)
    {
        $memberModel = new Member();
        $infoBooking = $memberModel->getInfoBooking($memberId);
        return $this->render('complete', [
                    'salonId' => $salonId,
                    'infoBooking' => $infoBooking,
                    'memberId' => $memberId,
        ]);
    }

    /*
     * booking calendar popup
     * @author Nguyen binh nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function actionCalendar($salonId = null)
    {
        $userAuth = \Yii::$app->user->getIdentity()->getAttributes();
        $salonId = $userAuth['salon_id'];
        $dataGet = Yii::$app->request->get();
        $month = isset($dataGet['m']) ? $dataGet['m'] : date('m');
        $year = isset($dataGet['y']) ? $dataGet['y'] : date('Y');
        $day = isset($dataGet['d']) ? $dataGet['d'] : date('d');

        $salonOpenOb = new SalonOpen();
        $strMonth = date('Y-m');
        if ($month && $year) {
            $strMonth = date('Y-m', strtotime($year . '-' . $month . '-01'));
        }

        $salonOpenInMonth = $salonOpenOb->getBySalonIdAndMonth($salonId, $strMonth);
        $listSalonOpenCloseInMonth = $salonOpenOb->formatDataOpenClose($salonOpenInMonth);
        $dataDateType = $salonOpenOb->formatDataDateType($salonOpenInMonth);


        $calendar = new Calendar($month, $year);
        $selected = $calendar->event()
                ->condition('timestamp', strtotime($year . '-' . $month . '-' . $day))
                ->output('selected-date');

        $calendar->standard('today')
                ->standard('prev-next')
//                ->standard('holidays')
                ->attach($selected);

        //set view
        Yii::$app->layout = false;
        return $this->render('calendar', [
                    'salonId' => $salonId,
                    'calendar' => $calendar,
                    'year' => $year,
                    'month' => $month,
                    'listSalonOpenCloseInMonth' => $listSalonOpenCloseInMonth,
                    'dataDateType' => $dataDateType,
        ]);
    }

}
