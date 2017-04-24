<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "salon_group".
 *
 * @property integer $salon_group_id
 * @property string $salon_group_name
 * @property string $description
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class SalonGroup extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salon_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salon_group_name'], 'required'],
            [['description', 'memo'], 'string'],
            [['admin_id'], 'integer'],
            [['reg_datetime', 'upd_datetime'], 'safe'],
            [['salon_group_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'salon_group_id' => 'Salon Group ID',
            'salon_group_name' => 'Salon Group Name',
            'description' => 'Description',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}
