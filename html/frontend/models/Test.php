<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member_login".
 *
 * @property integer $member_id
 * @property string $login_id
 * @property string $member_pw
 * @property string $member_email
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class Test extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_login';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login_id', 'member_pw', 'member_email', 'reg_datetime'], 'required'],
            [['reg_datetime', 'upd_datetime', 'file'], 'safe'],
            [['memo'], 'string'],
            [['login_id', 'member_pw', 'member_email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_id' => 'Member ID',
            'login_id' => 'Login ID',
            'member_pw' => 'Member Pw',
            'member_email' => 'Member Email',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
        ];
    }

}