<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use common\components\MyActiveRecord;

/**
 * This is the model class for table "salon_open".
 *
 * @property integer $salon_open_id
 * @property integer $salon_id
 * @property string $salon_date
 * @property integer $date_type
 * @property string $open_datetime
 * @property string $close_datetime
 * @property integer $status
 * @property string $reg_datetime
 * @property string $upd_datetime
 */
class SalonOpen extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salon_open';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//			[['salon_id', 'salon_date', 'date_type', 'open_datetime', 'close_datetime'], 'required'],
            [['salon_id', 'date_type', 'status'], 'integer'],
            [['salon_date', 'open_datetime', 'close_datetime', 'reg_datetime', 'upd_datetime'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'salon_open_id' => 'Salon Open ID',
            'salon_id' => 'Salon ID',
            'salon_date' => 'Salon Date',
            'date_type' => 'Date Type',
            'open_datetime' => 'Open Datetime',
            'close_datetime' => 'Close Datetime',
            'status' => 'Status',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
        ];
    }

    /*
     * getMaxDatetime
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     * @param $salonId int
     * @return object
     */

    public static function getMaxDatetime($salonId)
    {
        return SalonOpen::find()->where(['salon_id' => $salonId])->orderBy('salon_date desc')->one();
    }

    /*
     * createDateRangeArray
     * @param $strDateFrom format ('Y-m-d')
     * @param $strDateTo format ('Y-m-d')
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */

    public static function createDateRangeArray($strDateFrom, $strDateTo)
    {
        $aryRange = array();

        $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2), substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
        $iDateTo = mktime(1, 0, 0, substr($strDateTo, 5, 2), substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));

        if ($iDateTo >= $iDateFrom) {
            array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry

            while ($iDateFrom < $iDateTo) {
                $iDateFrom+=86400; // add 24 hours
                array_push($aryRange, date('Y-m-d', $iDateFrom));
            }
        }
        return $aryRange;
    }

    /*
     * checkRepeatOff
     * @param $date (2015-01-24)
     * @param $dataPost array data request by method post
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */

    public static function checkRepeatOff($date, $dataPost = array())
    {
        $isSalonClose = false;

        if (isset($dataPost['SalonOpenForm']['repeat']) && $dataPost['SalonOpenForm']['repeat'] == 'day_of_week') {
            $ruleDayOfWeek = $dataPost['SalonOpenForm']['dayOfWeek'];
            $year = date('Y', strtotime($date));
            foreach ($ruleDayOfWeek as $key => $value) {

                if ($value['month'] == 'every_month') {
                    $strTimeMonth = date('m', strtotime($date));
                } else {
                    if (date('m', strtotime($date)) != $value['month']) {
                        continue;
                    }
                    $strTimeMonth = $value['month'];
                }

                if ($value['week'] == 'every_week') {
                    //compare day of week
                    if (date('l', strtotime($date)) == $value['day']) {
                        $isSalonClose = true;
                        break;
                    }
                } else {
                    if ($date == date('Y-m-d', strtotime($year . '-' . $strTimeMonth . ' +' . ($value['week'] - 1) . ' week ' . $value['day']))) {
                        $isSalonClose = true;
                        break;
                    }
                }
            }
        } elseif (isset($dataPost['SalonOpenForm']['repeat']) && $dataPost['SalonOpenForm']['repeat'] == 'day_specified') {
            $ruleSpecifiedDate = $dataPost['SalonOpenForm']['specifiedDate'];
            $year = date('Y', strtotime($date));
            foreach ($ruleSpecifiedDate as $key => $value) {

                if ($value['month'] == 'every_month') {
                    $strTimeMonth = date('m', strtotime($date));
                } else {
                    if (date('m', strtotime($date)) != $value['month']) {
                        continue;
                    }
                    $strTimeMonth = $value['month'];
                }
                if (date('Y-m-d', strtotime($date)) == date('Y-m-d', strtotime($year . '-' . $strTimeMonth . '-' . $value['date']))) {
                    $isSalonClose = true;
                    break;
                }
            }
        }

        return $isSalonClose;
    }

    /*
     * checkSpecialHoliday
     * @param $date (2015-01-24),
     * @param $dataPost array data request by method post
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     */

    public static function checkSpecialHoliday($date, $specialHoliday)
    {
        $isSalonClose = false;

        foreach ($specialHoliday as $key => $value) {
            $beginHoliday = date('Y-m-d', strtotime($value['year']['begin'] . '-' . $value['month']['begin'] . '-' . $value['day']['begin']));
            $endHoliday = date('Y-m-d', strtotime($value['year']['end'] . '-' . $value['month']['end'] . '-' . $value['day']['end']));
            if ($date >= $beginHoliday && $date <= $endHoliday) {
                $isSalonClose = true;
                break;
            }
        }

        return $isSalonClose;
    }

    /*
     * Get first record Salon Open by salon_id
     *
     * @since : 21/01/2015
     * @author Can Tuan Anh <anhct6285@seta-asia.com.vn>
     */

    public function getFirstSalonOpenBySalonId($salonId)
    {
        return $this->find()
                        ->where(['salon_id' => $salonId, 'status' => 1])
                        ->orderBy(['salon_date' => SORT_DESC])
                        ->one();
    }

    /*
     * getBySalonIdAndMonth
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     * @param $salonId int
     * @param $strMonth string ('2015-09')
     * @return array
     */

    public function getBySalonIdAndMonth($salonId, $strMonth = null)
    {
        return SalonOpen::find()
                        ->where('DATE_FORMAT(salon_date, "%Y-%m") = :salon_date AND salon_id = :salon_id', [':salon_date' => $strMonth, ':salon_id' => $salonId])
                        ->all();
    }

    /*
     * formatDataOpenClose
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     * @param $salonOpenInMonth array
     * @return array
     */

    public function formatDataOpenClose($salonOpenInMonth)
    {
        if ($salonOpenInMonth) {
            $listSalonOpenCloseInMonth = array();
            foreach ($salonOpenInMonth as $key => $value) {
                $listSalonOpenCloseInMonth[$value->salon_date] = date('H:i', strtotime($value->open_datetime)) . '〜' . date('H:i', strtotime($value->close_datetime));
            }

            return $listSalonOpenCloseInMonth;
        } else {
            return null;
        }
    }

    /*
     * formatDataOpenClose
     * @author Nguyen Binh Nguyen <nguyennb6390@seta-asia.com.vn>
     * @param $salonOpenInMonth array
     * @return array
     */

    public function formatDataDateType($salonOpenInMonth)
    {
        if ($salonOpenInMonth) {
            $dataDateType = array();
            foreach ($salonOpenInMonth as $key => $value) {
                $dataDateType[$value->salon_date] = $value->date_type;
            }

            return $dataDateType;
        } else {
            return null;
        }
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

}
