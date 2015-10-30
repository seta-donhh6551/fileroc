<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "salon".
 *
 * @property integer $salon_id
 * @property integer $salon_group_id
 * @property string $pos_shop_cd
 * @property string $salon_name
 * @property string $salon_kana
 * @property string $salon_tel
 * @property string $zip_cd
 * @property string $jis_code
 * @property string $addr_ken
 * @property string $addr_shi
 * @property string $addr_cho
 * @property string $addr_bldg
 * @property double $longitude
 * @property double $latitude
 * @property integer $salon_type
 * @property integer $gender_type
 * @property string $holiday_other
 * @property string $open_time
 * @property string $close_time
 * @property string $open_other
 * @property integer $reservable_days
 * @property integer $capacity
 * @property integer $timelimit_atday
 * @property integer $status
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class SalonCustom extends \common\models\Salon
{

}
