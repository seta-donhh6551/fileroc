<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\MemberSchedule;
use common\models\SalonOpen;
use common\models\Facility;
use common\models\RMemberSalonFacility;

/**
 * SalonBookingForm
 *
 * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
 */
class SalonBookingForm extends \yii\db\ActiveRecord
{

    public $timeBooking;
    public $facility;
    public $facilityOther;
    public $reservableDays;
    public $capacity;
    public $salonId;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['timeBooking', 'validateDatetime'],
            ['timeBooking', 'validateReservableDays'],
            ['timeBooking', 'validateCapacity'],
            ['facility', 'validateFacility'],
        ];
    }

    /**
     * validateDatetime.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function validateDatetime($attribute, $params)
    {
        $timeBooking = $this->timeBooking;
        $strDatetimeStart = $timeBooking['year'] . '-' . $timeBooking['month'] . '-' . $timeBooking['day'] . ' ' . $timeBooking['hour'] . ':' . $timeBooking['minute'];
        $now = date('Y-m-d H:i');
        if ($now > date('Y-m-d H:i', strtotime($strDatetimeStart))) {
            $this->addError($attribute, \Yii::t('app', 'datetime error selected datetime less than currenttime'));
        } else {
            foreach ($timeBooking as $key => $value) {
                if ($value == 'default') {
                    $this->addError($attribute, \Yii::t('app', 'datetime error'));
                    break;
                }
            }
        }
    }

    /**
     * validateReservableDays.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function validateReservableDays($attribute, $params)
    {
        $timeBooking = $this->timeBooking;
        $reservableDays = @$this->reservableDays;
        if (!$reservableDays) {
            $reservableDays = 100;
        }

        $strReservableDays = date('Y-m-d', strtotime('+ ' . $reservableDays . ' days'));
        $strDatetimeStart = $timeBooking['year'] . '-' . $timeBooking['month'] . '-' . $timeBooking['day'] . ' ' . $timeBooking['hour'] . ':' . $timeBooking['minute'];
        $strDatetimeEnd = date('Y-m-d', strtotime($strDatetimeStart . ' +' . ($timeBooking['range'] - 1) . ' minutes'));

        if ($strDatetimeEnd > $strReservableDays) {
            $this->addError($attribute, \Yii::t('app', 'error datetime select more than salon reservable days'));
        }
    }

    /**
     * validateCapacity.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function validateCapacity($attribute, $params)
    {

        $timeBooking = $this->timeBooking;
        $capacity = @$this->capacity;
        $salonId = $this->salonId;
        if (!$capacity) {
            $capacity = 0;
        }
        //current day selected booking
        $strDateBooking = date('Y-m-d', strtotime($timeBooking['year'] . '-' . $timeBooking['month'] . '-' . $timeBooking['day']));
        //get count booking salon by date
        $memberSchedule = new MemberSchedule();
        $countBookByDay = $memberSchedule->getCountBookByDay($salonId, $strDateBooking);
        if ($countBookByDay > $capacity) {
            $this->addError($attribute, \Yii::t('app', 'error count member booking more than salon capacity'));
        }
    }

    /**
     * validateCapacity.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function validateFacility($attribute, $params)
    {
        //get salon_facility used
        $arrFacility = $this->facility;
        $arrFacilityOther = $this->facilityOther;
        if (is_array($arrFacilityOther)) {
            $arrFacility = array_merge($arrFacility, $arrFacilityOther);
        }

        $salonId = $this->salonId;

        $timeBooking = $this->timeBooking;
        $strDatetime = $timeBooking['year'] . '-' . $timeBooking['month'] . '-' . $timeBooking['day'] . ' ' . $timeBooking['hour'] . ':' . $timeBooking['minute'];
        $strDatetimeStart = date('Y-m-d H:i', strtotime($strDatetime));
        $strDatetimeEnd = date('Y-m-d H:i', strtotime($strDatetime . ' +' . $timeBooking['range'] . ' minutes'));

        $memberSchedule = new MemberSchedule();
//        $listFacilityBooked = $memberSchedule->getFacilityBooked($salonId, $arrFacility,  $strDatetimeStart, $strDatetimeEnd);
        $listSalonFacilityBooked = $this->salonFacilityBooked($arrFacility, $salonId, $strDatetimeStart, $strDatetimeEnd);
        $listSalonFacilityAll = $this->salonFacilityAll($arrFacility, $salonId);
        //compare
        $limitFacility = false;
        foreach ($arrFacility as $key => $val) {
            $countBooked = 0;
            foreach ($listSalonFacilityBooked as $key => $valueBooked) {
                if ($valueBooked['facility_id'] == $val) {
                    $countBooked ++;
                }
            }
            $countAll = 0;
            foreach ($listSalonFacilityAll as $key => $valueAll) {
                if ($valueAll['facility_id'] == $val) {
                    $countAll ++;
                }
            }
            if ($countBooked >= $countAll) {
                $limitFacility = true;
                break;
            }
        }

        if ($limitFacility) {
            $this->addError($attribute, \Yii::t('app', 'error limit facility'));
        }
        //get salon_facility all
    }

    /**
     * salonFacilityAll.
     *
     * @param int $salonId
     * @param array $arrFacility
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function salonFacilityAll($arrFacility, $salonId)
    {
        $query = new \yii\db\Query();
        return $query->select('facility_id, salon_facility_id')
                        ->from('salon_facility')
                        ->where(
                                'salon_id = :salon_id '
                                . 'AND facility_id IN("' . implode($arrFacility, '","') . '")', [
                            ':salon_id' => $salonId,
                        ])
                        ->all();
    }

    /**
     * salonFacilityBooked.
     *
     * @param string $strDatetimeStart
     * @param string $strDatetimeEnd
     * @param int $salonId
     * @param array $arrFacility
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function salonFacilityBooked($arrFacility, $salonId, $strDatetimeStart, $strDatetimeEnd)
    {
        $query = new \yii\db\Query();
        return $query->select('facility_id, salon_facility_id')
                        ->from('r_member_salon_facility')
                        ->where(
                                '((start_datetime < :start_datetime AND end_datetime > :start_datetime) '
                                . 'OR (start_datetime < :end_datetime AND end_datetime > :end_datetime)) '
                                . 'AND salon_id = :salon_id '
                                . 'AND status <> 9 '
                                . 'AND facility_id IN("' . implode($arrFacility, '","') . '")', [
                            ':start_datetime' => $strDatetimeStart,
                            ':end_datetime' => $strDatetimeEnd,
                            ':salon_id' => $salonId,
                        ])
                        ->all();
    }

    /**
     * getReserveType.
     *
     * @param array $infoBooking
     * @param object $memberScheduleObj
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     * @return int $reserveType
     */
    public function getReserveType($infoBooking, $memberScheduleObj)
    {
        $reserveType = 1;
        $strStartTimeBooking = date('H:i:s', strtotime($memberScheduleObj->start_datetime));
        $strCloseTimeBooking = date('H:i:s', strtotime($memberScheduleObj->end_datetime));

        //1. Compare member.gender vs salon_membertype.gender_type
        if ($infoBooking['gender'] != $infoBooking['gender_type']) {
            $reserveType = 9;
        }

        //2. member_schedule.count_monthly vs salon_membertype.use_limit
        if ($memberScheduleObj->count_monthly > $infoBooking['use_limit']) {
            $reserveType = 9;
        }

        //3. when salon_membertype.timelimit_flg = 1 check in start_time, end_time
        if ($infoBooking['timelimit_flg'] == 1) {
            if ($strStartTimeBooking < $infoBooking['start_time'] || $strStartTimeBooking > $infoBooking['close_time'] || $strCloseTimeBooking < $infoBooking['start_time'] || $strCloseTimeBooking > $infoBooking['close_time']) {
                $reserveType = 9;
            }
        }

        //4. check salon_open.open_datetime, close_datetime
        $salonOpenOb = new SalonOpen();
        $salonOpenDetail = $salonOpenOb->getBySalonIdAndDate($memberScheduleObj->salon_id, $memberScheduleObj->start_datetime);

        if ($strStartTimeBooking < date('H:i:s', strtotime($salonOpenDetail['open_datetime'])) || $strStartTimeBooking > date('H:i:s', strtotime($salonOpenDetail['close_datetime'])) || $strCloseTimeBooking < date('H:i:s', strtotime($salonOpenDetail['open_datetime'])) || $strCloseTimeBooking > date('H:i:s', strtotime($salonOpenDetail['close_datetime']))) {
            $reserveType = 9;
        }
        if ($salonOpenDetail['date_type'] != 1) {
            $reserveType = 9;
        }

        return $reserveType;
    }

    /**
     * providerFacilityList.
     *
     * @param int $salonId
     * @param int $salonMemberTypeId
     * @param int $gender
     * @param boolean $getOther
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     * @return  array
     */
    public function providerFacilityList($salonId = null, $salonMemberTypeId = null, $getOther = false, $gender)
    {
        $facilityModel = new Facility();
        $facilityList = $facilityModel->getBySalonId($salonId, $salonMemberTypeId, $getOther, $gender);
        //provider for list checkbox $facilityList
        $providerFacilityList = array();
        if ($facilityList) {
            foreach ($facilityList as $key => $value) {
                if ($getOther) {
                    $userTimeAlow = $value['usage_time'];
                } else {
                    $userTimeAlow = $value['max_usage_time'];
                }
                $providerFacilityList[$value['facility_id']] = $value['facility_name'] . '(' . $userTimeAlow . '分)';
            }
        }
        return $providerFacilityList;
    }

    /**
     * getFacilityANDUsageTime.
     *
     * @param int $salonId
     * @param int $salonMemberTypeId
     * @param int $gender
     * @param boolean $getOther
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     * @return  array
     */
    public function getFacilityANDUsageTime($salonId = null, $salonMemberTypeId = null, $getOther = false, $gender)
    {
        $facilityModel = new Facility();
        $facilityList = $facilityModel->getBySalonId($salonId, $salonMemberTypeId, $getOther, $gender);
        //provider for list checkbox $facilityList
        $facilityANDUsageTime = array();
        if ($facilityList) {
            foreach ($facilityList as $key => $value) {
                if ($getOther) {
                    $userTimeAlow = $value['usage_time'];
                } else {
                    $userTimeAlow = $value['max_usage_time'];
                }
                $facilityANDUsageTime[$value['facility_id']] = $userTimeAlow ;
            }
        }
        return $facilityANDUsageTime;
    }

    /**
     * addData.
     *
     * @param int $salonId
     * @param int $memberId
     * @param int $salonMemberTypeId
     * @param int $maxCountMonth
     * @param array $dataPost
     * @param array $infoBooking
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     * @return  boolean
     */
    public function addData($salonId = null, $memberId = null, $salonMemberTypeId = null, $dataPost = array(), $infoBooking = array(), $maxCountMonth = 0, $gender)
    {
        // transaction
        try {
            $transaction = self::getDb()->beginTransaction();
            //validate ====================================================
            $this->timeBooking = $dataPost['SalonBookingForm']['timeBooking'];
            $this->facility = $dataPost['SalonBookingForm']['facility'];
            $this->facilityOther = $dataPost['SalonBookingForm']['facilityOther'];
            $this->reservableDays = $infoBooking['reservable_days'];
            $this->capacity = $infoBooking['capacity'];
            $this->salonId = $salonId;
            if ($this->validate()) {
                $timeBooking = $dataPost['SalonBookingForm']['timeBooking'];
                $strDatetime = $timeBooking['year'] . '-' . $timeBooking['month'] . '-' . $timeBooking['day'] . ' ' . $timeBooking['hour'] . ':' . $timeBooking['minute'];
                $strDatetimeStart = date('Y-m-d H:i', strtotime($strDatetime));
                $strDatetimeEnd = date('Y-m-d H:i', strtotime($strDatetime . ' +' . $timeBooking['range'] . ' minutes'));

                //insert
                $memberScheduleObj = new MemberSchedule();
                $memberScheduleObj->member_id = $memberId;
                $memberScheduleObj->pos_member_cd = $infoBooking['pos_member_cd'];
                $memberScheduleObj->salon_membertype_id = $salonMemberTypeId;
                $memberScheduleObj->salon_id = $salonId;
                $memberScheduleObj->user_name = $infoBooking['user_name'];
                $memberScheduleObj->user_kana = $infoBooking['user_kana'];
                $memberScheduleObj->user_tel = $infoBooking['user_tel'];
                $memberScheduleObj->start_datetime = $strDatetimeStart;
                $memberScheduleObj->end_datetime = $strDatetimeEnd;
                $memberScheduleObj->entry_type = 3;
                $memberScheduleObj->status = 1;
                $memberScheduleObj->count_monthly = $maxCountMonth + 1;
                $memberScheduleObj->admin_id = $infoBooking['admin_id'];
                $memberScheduleObj->reg_datetime = new \yii\db\Expression('NOW()');
                $memberScheduleObj->save();

                //BEGIN insert r_member_salon_facility ===============================
                $arrFacility = array();
                if ($dataPost['SalonBookingForm']['facility']) {
                    $arrFacility = $dataPost['SalonBookingForm']['facility'];
                }
                if ($dataPost['SalonBookingForm']['facilityOther']) {
                    $arrFacilityOther = $dataPost['SalonBookingForm']['facilityOther'];
                    $arrFacility = array_merge($arrFacility, $arrFacilityOther);
                }
                if (sizeof($arrFacility) > 0) {
                    $listSalonFacilityAll = $this->salonFacilityAll($arrFacility, $salonId);
                    $listSalonFacilityBooked = $this->salonFacilityBooked($arrFacility, $salonId, $strDatetimeStart, $strDatetimeEnd);

                    //get array salon facility allow insert (not used)
                    $arrSalonFacilityNotAllow = array();
                    foreach ($listSalonFacilityBooked as $key => $value) {
                        $arrSalonFacilityNotAllow[] = $value['salon_facility_id'];
                    }

                    //get array salon facility allow insert (not used)
                    $arraySalonFacilityAllow = array();
                    foreach ($listSalonFacilityAll as $key => $value) {
                        if (!in_array($value['salon_facility_id'], $arrSalonFacilityNotAllow)) {
                            $arraySalonFacilityAllow[$value['facility_id']] = $value['salon_facility_id'];
                        }
                    }

                    //check warning ===========================================BEGIN
                    $reserveType = $this->getReserveType($infoBooking, $memberScheduleObj);
                    //check warning ===========================================END

                    //getFacilityANDUsageTime
                    $facilityANDUsageTime = $this->getFacilityANDUsageTime($salonId, $salonMemberTypeId, false, $gender);
                    $facilityANDUsageTimeOther = $this->getFacilityANDUsageTime($salonId, $salonMemberTypeId, true, $gender);

                    $facilityANDUsageTimeAll = array();
                    foreach ($facilityANDUsageTime as $key => $value) {
                        $facilityANDUsageTimeAll[$key] = $value;
                    }
                    foreach ($facilityANDUsageTimeOther as $key => $value) {
                        $facilityANDUsageTimeAll[$key] = $value;
                    }

                    //insert
                    foreach ($arraySalonFacilityAllow as $key => $value) {
                        $rMemberSalonFacility = new RMemberSalonFacility();
                        $rMemberSalonFacility->member_id = $memberId;
                        $rMemberSalonFacility->salon_membertype_id = $salonMemberTypeId;
                        $rMemberSalonFacility->salon_id = $salonId;
                        $rMemberSalonFacility->facility_id = $key;
                        $rMemberSalonFacility->salon_facility_id = $value;
                        $rMemberSalonFacility->member_schedule_id = $memberScheduleObj->member_schedule_id;
                        $rMemberSalonFacility->reserve_type = $reserveType;
                        $rMemberSalonFacility->start_datetime = $strDatetimeStart;
                        $rMemberSalonFacility->end_datetime = date('Y-m-d H:i:s', strtotime($strDatetimeStart . '+' . $facilityANDUsageTimeAll[$key] . ' minutes'));
                        $rMemberSalonFacility->reg_datetime = new \yii\db\Expression('NOW()');
                        $rMemberSalonFacility->save();
                    }
                    //END insert r_member_salon_facility ===============================
                }
                $successFlag = true;
            } else {
                $successFlag = false;
            }

            $transaction->commit();
            return $successFlag;
        } catch (Exception $e) {
            $transaction->rollBack();
            return false;
        }
    }

    /**
     * editData
     *
     * @param array $param
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     * @return  boolean
     */
    public function editData($param = array())
    {
        // transaction
        try {
            $transaction = self::getDb()->beginTransaction();

            $salonId = $param['salonId'];
            $memberId = $param['memberId'];
            $memberScheduleId = $param['memberScheduleId'];
            $dataPost = $param['dataPost'];
            $salonMemberTypeId = $param['salonMemberTypeId'];
            $maxCountMonth = $param['maxCountMonth'];
            $infoBooking = $param['infoBooking'];
            $timeBooking = $param['timeBooking'];
            $facilitySelected = $param['facilitySelected'];
            $gender = $param['gender'];

            $this->timeBooking = $dataPost['SalonBookingForm']['timeBooking'];
            $this->facility = $dataPost['SalonBookingForm']['facility'];
            $this->facilityOther = $dataPost['SalonBookingForm']['facilityOther'];
            $this->reservableDays = $infoBooking['reservable_days'];
            $this->capacity = $infoBooking['capacity'];
            $this->salonId = $salonId;
            if ($this->validate()) {
                $timeBooking = $dataPost['SalonBookingForm']['timeBooking'];
                $strDatetime = $timeBooking['year'] . '-' . $timeBooking['month'] . '-' . $timeBooking['day'] . ' ' . $timeBooking['hour'] . ':' . $timeBooking['minute'];
                $strDatetimeStart = date('Y-m-d H:i', strtotime($strDatetime));
                $strDatetimeEnd = date('Y-m-d H:i', strtotime($strDatetime . ' +' . $timeBooking['range'] . ' minutes'));

                //insert
                $memberScheduleModel = new MemberSchedule();
                $memberScheduleObjUpdate = $memberScheduleModel->findOne(['member_schedule_id' => $memberScheduleId]);
                $memberScheduleObjUpdate->member_id = $memberId;
                $memberScheduleObjUpdate->pos_member_cd = $infoBooking['pos_member_cd'];
                $memberScheduleObjUpdate->salon_membertype_id = $salonMemberTypeId;
                $memberScheduleObjUpdate->salon_id = $salonId;
                $memberScheduleObjUpdate->user_name = $infoBooking['user_name'];
                $memberScheduleObjUpdate->user_kana = $infoBooking['user_kana'];
                $memberScheduleObjUpdate->user_tel = $infoBooking['user_tel'];
                $memberScheduleObjUpdate->start_datetime = $strDatetimeStart;
                $memberScheduleObjUpdate->end_datetime = $strDatetimeEnd;
                $memberScheduleObjUpdate->entry_type = 3;
                $memberScheduleObjUpdate->status = 1;
                $memberScheduleObjUpdate->count_monthly = $maxCountMonth + 1;
                $memberScheduleObjUpdate->admin_id = $infoBooking['admin_id'];
                $memberScheduleObjUpdate->upd_datetime = new \yii\db\Expression('NOW()');
                $memberScheduleObjUpdate->save();

                //BEGIN insert r_member_salon_facility ===============================
                $arrFacility = array();
                if ($dataPost['SalonBookingForm']['facility']) {
                    $arrFacility = $dataPost['SalonBookingForm']['facility'];
                }
                if ($dataPost['SalonBookingForm']['facilityOther']) {
                    $arrFacilityOther = $dataPost['SalonBookingForm']['facilityOther'];
                    $arrFacility = array_merge($arrFacility, $arrFacilityOther);
                }
                //list r_member_facility_salon delete.faciliti_id DELETE
                $arrDeleteFacility = array_diff($facilitySelected, $arrFacility);
                $arrAddNewFacility = array_diff($arrFacility, $facilitySelected);

                //delete r_member_facility_salon delete.faciliti_id
                RMemberSalonFacility::deleteByArrFacility($arrDeleteFacility, $memberScheduleId);

                $listSalonFacilityAll = $this->salonFacilityAll($arrFacility, $salonId);
                $listSalonFacilityBooked = $this->salonFacilityBooked($arrFacility, $salonId, $strDatetimeStart, $strDatetimeEnd);

                //get array salon facility allow insert (not used)
                $arrSalonFacilityNotAllow = array();
                foreach ($listSalonFacilityBooked as $key => $value) {
                    $arrSalonFacilityNotAllow[] = $value['salon_facility_id'];
                }

                //get array salon facility allow insert (not used)
                $arraySalonFacilityAllow = array();
                foreach ($listSalonFacilityAll as $key => $value) {
                    if (!in_array($value['salon_facility_id'], $arrSalonFacilityNotAllow)) {
                        $arraySalonFacilityAllow[$value['facility_id']] = $value['salon_facility_id'];
                    }
                }

                //check warning ===========================================BEGIN
                $reserveType = $this->getReserveType($infoBooking, $memberScheduleObjUpdate);
                //check warning ===========================================END

                //getFacilityANDUsageTime
                $facilityANDUsageTime = $this->getFacilityANDUsageTime($salonId, $salonMemberTypeId, false, $gender);
                $facilityANDUsageTimeOther = $this->getFacilityANDUsageTime($salonId, $salonMemberTypeId, true, $gender);

                $facilityANDUsageTimeAll = array();
                foreach ($facilityANDUsageTime as $key => $value) {
                    $facilityANDUsageTimeAll[$key] = $value;
                }
                foreach ($facilityANDUsageTimeOther as $key => $value) {
                    $facilityANDUsageTimeAll[$key] = $value;
                }

                foreach ($arraySalonFacilityAllow as $key => $value) {

                    if (in_array($key, $arrAddNewFacility)) {
                        //add new
                        $rMemberSalonFacility = new RMemberSalonFacility();
                        $rMemberSalonFacility->member_id = $memberId;
                        $rMemberSalonFacility->salon_membertype_id = $salonMemberTypeId;
                        $rMemberSalonFacility->salon_id = $salonId;
                        $rMemberSalonFacility->facility_id = $key;
                        $rMemberSalonFacility->salon_facility_id = $value;
                        $rMemberSalonFacility->member_schedule_id = $memberScheduleId;
                        $rMemberSalonFacility->reserve_type = $reserveType;
                        $rMemberSalonFacility->start_datetime = $strDatetimeStart;
//                        $rMemberSalonFacility->end_datetime = $strDatetimeEnd;
                        $rMemberSalonFacility->end_datetime = date('Y-m-d H:i:s', strtotime($strDatetimeStart . ' +' . $facilityANDUsageTimeAll[$key] . ' minutes'));
                        $rMemberSalonFacility->reg_datetime = new \yii\db\Expression('NOW()');
                        $rMemberSalonFacility->save();
                    } else {
                        //edit
                        $rMemberSalonFacilityModelUpdate = new RMemberSalonFacility();
                        $rMemberSalonFacilityUpdate = $rMemberSalonFacilityModelUpdate->getByFacilityIdAndMemberScheduleId($memberScheduleId, $key);
                        $rMemberSalonFacilityUpdate->start_datetime = $strDatetimeStart;
                        $rMemberSalonFacilityUpdate->end_datetime = date('Y-m-d H:i:s', strtotime($strDatetimeStart . ' +' . $facilityANDUsageTimeAll[$key] . ' minutes'));
                        $rMemberSalonFacilityUpdate->upd_datetime = new \yii\db\Expression('NOW()');
                        $rMemberSalonFacilityUpdate->save();
                    }
                }
                //END insert r_member_salon_facility ===============================
                $successFlag = true;
            } else {
                $successFlag = false;
            }

            $transaction->commit();
            return $successFlag;
        } catch (Exception $e) {
            $transaction->rollBack();
            return false;
        }
    }

}
