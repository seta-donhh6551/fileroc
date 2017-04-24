<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "facility".
 *
 * @property integer $facility_id
 * @property string $facility_name
 * @property string $facility_kana
 * @property string $facility_type
 * @property string $facility_image
 * @property string $description
 * @property integer $status
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class Facility extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facility';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['facility_name', 'facility_kana'], 'required'],
            [['description', 'memo'], 'string'],
            [['status', 'admin_id'], 'integer'],
            [['reg_datetime', 'upd_datetime'], 'safe'],
            [['facility_name', 'facility_kana', 'facility_type', 'facility_image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'facility_id' => 'Facility ID',
            'facility_name' => 'Facility Name',
            'facility_kana' => 'Facility Kana',
            'facility_type' => 'Facility Type',
            'facility_image' => 'Facility Image',
            'description' => 'Description',
            'status' => 'Status',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}
