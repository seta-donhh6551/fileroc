<?php

namespace common\models;

use Yii;
use yii\base\Model;
use common\models\Salon;
use common\models\SalonOpen;

/**
 * SalonOpenForm
 *
 * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
 */
class SalonOpenForm extends Model
{

    public $hourOpen;
    public $minuteOpen;
    public $hourClose;
    public $minuteClose;
    public $repeat = 'day_of_week';
    public $dayOfWeek;
    public $specifiedDate;
    public $specialHoliday;
    public $periodMax;

    public function beforeValidate()
    {
        $specialHoliday = $this->specialHoliday;
        foreach ($this->specialHoliday as $key => $value) {
            if ($value['day']['begin'] != date('j', mktime(0, 0, 0, $value['month']['begin'], $value['day']['begin'], $value['year']['begin']))) {
                $specialHoliday[$key]['day']['begin'] = 1;
                $specialHoliday[$key]['month']['begin'] = $value['month']['begin'] + 1;
            }
            if ($value['day']['end'] != date('j', mktime(0, 0, 0, $value['month']['end'], $value['day']['end'], $value['year']['end']))) {
                $specialHoliday[$key]['day']['end'] = date('t', mktime(0, 0, 0, $value['month']['end'], 1, $value['year']['end']));
            }
        }
        $this->specialHoliday = $specialHoliday;
        return true;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//			[['hourOpen', 'minuteOpen', 'hourClose', 'minuteClose'], 'required'],
            ['hourOpen', 'validateOpenCloseTime'],
            ['specialHoliday', 'validateDateBeginEnd'],
        ];
    }

    /**
     * validateOpenCloseTime.
     * This method serves as the inline validation for hour open close.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function validateOpenCloseTime($attribute, $params)
    {
        if ($this->hourOpen . $this->minuteOpen >= $this->hourClose . $this->minuteClose) {
            $this->addError($attribute, \Yii::t('app', 'validation begin greate than end'));
        }
    }

    /**
     * validateDateBeginEnd.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function validateDateBeginEnd($attribute, $params)
    {
        foreach ($this->specialHoliday as $key => $value) {
            $strBegin = mktime(0, 0, 0, $value['month']['begin'], $value['day']['begin'], $value['year']['begin']);
            $strEnd = mktime(0, 0, 0, $value['month']['end'], $value['day']['end'], $value['year']['end']);
            if ($strBegin > $strEnd) {
                $this->addError($attribute, \Yii::t('app', 'validation holiday begin greate than holiday end'));
            }
        }
    }

    /**
     * saveData
     *
     * @param array $dataPost
     * @param int $salonId
     * @param string $salonDateMax
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function saveData($dataPost, $salonId = null, $salonDateMax = null)
    {
        //validate ====================================================
        $this->load($dataPost);
        $this->hourOpen = $dataPost['SalonOpenForm']['hourOpen'];
        $this->minuteOpen = $dataPost['SalonOpenForm']['minuteOpen'];
        $this->hourClose = $dataPost['SalonOpenForm']['hourClose'];
        $this->minuteClose = $dataPost['SalonOpenForm']['minuteClose'];
        $this->repeat = $dataPost['SalonOpenForm']['repeat'];
        $this->dayOfWeek = $dataPost['SalonOpenForm']['dayOfWeek'];
        $this->specifiedDate = $dataPost['SalonOpenForm']['specifiedDate'];
        $this->specialHoliday = $dataPost['SalonOpenForm']['specialHoliday'];
        $this->periodMax = $dataPost['SalonOpenForm']['periodMax'];

        if ($this->validate()) {
            //get list date insert into salon_open:
            $datetimePeriodBegin = date('Y-m-d', strtotime(str_replace('-', '/', $salonDateMax) . "+1 days"));
            $datetimePeriodEnd = date('Y-m-d', strtotime(
                            $dataPost['SalonOpenForm']['periodMax']['year'] . '-'
                            . $dataPost['SalonOpenForm']['periodMax']['month'] . '-'
                            . $dataPost['SalonOpenForm']['periodMax']['day']
            ));

            $listDateInsert = SalonOpen::createDateRangeArray($datetimePeriodBegin, $datetimePeriodEnd);

            //check date off by week
            $listOffDayOfWeek = array();
            $listOffSpecialHoliday = array();
            foreach ($listDateInsert as $key => $value) {
                if (SalonOpen::checkRepeatOff($value, $dataPost)) {
                    $listOffDayOfWeek[] = $value;
                }
                if (SalonOpen::checkSpecialHoliday($value, $this->specialHoliday)) {
                    $listOffSpecialHoliday[] = $value;
                }
            }

            //insert date
            foreach ($listDateInsert as $key => $value) {
                $salonOpenOb = new SalonOpen();

                $salonOpenOb->setAttribute('salon_id', $salonId);
                $salonOpenOb->setAttribute('salon_date', $value);
                $dateType = 1;

                if (in_array($value, $listOffDayOfWeek)) {
                    $dateType = 9;
                } else if (in_array($value, $listOffSpecialHoliday)) {
                    $dateType = 9;
                }
                $salonOpenOb->setAttribute('date_type', $dateType);
                $salonOpenOb->setAttribute('open_datetime', $value . ' ' . $dataPost['SalonOpenForm']['hourOpen'] . '-' . $dataPost['SalonOpenForm']['minuteOpen']);
                $salonOpenOb->setAttribute('close_datetime', $value . ' ' . $dataPost['SalonOpenForm']['hourClose'] . '-' . $dataPost['SalonOpenForm']['minuteClose']);
                $salonOpenOb->setAttribute('status', 1);
                $salonOpenOb->setAttribute('reg_datetime', date('Y-m-d H:i:s'));

                $salonOpenOb->save();
            }
            return true;
        }
        return false;
    }

    /**
     * editData
     *
     * @param array $dataPost
     * @param int $salonId
     * @param string $salonDate
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */
    public function editData($dataPost, $salonId = null, $salonDate = null)
    {
        $this->load($dataPost);
        $this->hourOpen = $dataPost['SalonOpenForm']['hourOpen'];
        $this->minuteOpen = $dataPost['SalonOpenForm']['minuteOpen'];
        $this->hourClose = $dataPost['SalonOpenForm']['hourClose'];
        $this->minuteClose = $dataPost['SalonOpenForm']['minuteClose'];

        if ($this->validate()) {
            $salonOpenData = SalonOpen::find()
                    ->where(['salon_date' => date('Y-m-d', strtotime($salonDate)), 'salon_id' => $salonId])
                    ->one();
            if (!$salonOpenData) {
                $salonData = Salon::findOne(['salon_id' => $salonId]);
                $salonOpenData = new SalonOpen();
                $salonOpenData->salon_id = $salonId;
                $salonOpenData->salon_date = $salonDate;
                $salonOpenData->open_datetime = $salonDate . ' ' . $salonData->open_time;
                $salonOpenData->close_datetime = $salonDate . ' ' . $salonData->close_time;
                $salonOpenData->date_type = 1;
                $salonOpenData->status = 1;
            }

            $salonOpenData->open_datetime = $salonDate . ' ' . $dataPost['SalonOpenForm']['hourOpen'] . ':' . $dataPost['SalonOpenForm']['minuteOpen'];
            $salonOpenData->close_datetime = $salonDate . ' ' . $dataPost['SalonOpenForm']['hourClose'] . ':' . $dataPost['SalonOpenForm']['minuteClose'];
            $salonOpenData->upd_datetime = date('Y-m-d H:i:s');
            $salonOpenData->save();
            return true;
            //update or insert data
        }
        return false;
    }
    /*
     * getBySalonIdAndDate
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     * @param $salonId int
     * @param $salonDate string
     * @return array
     */

    public function getBySalonIdAndDate($salonId, $salonDate)
    {
        return SalonOpen::find()
                        ->where(['salon_date' => date('Y-m-d', strtotime($salonDate)), 'salon_id' => $salonId])
                        ->one();
    }
    /*
     * getBySalonId
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     * @param $salonId int
     * @return array
     */

    public function getBySalonId($salonId)
    {
        return Salon::findOne(['salon_id' => $salonId]);
    }
    /*
     * getBySalonId
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     * @param $salonId int
     * @return array
     */

    public function format($salonId)
    {
        return Salon::findOne(['salon_id' => $salonId]);
    }
}
