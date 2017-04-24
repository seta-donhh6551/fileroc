<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "member_action".
 *
 * @property integer $member_action_id
 * @property integer $member_id
 * @property string $pos_member_cd
 * @property string $pos_member_cd_OLD
 * @property integer $salon_id
 * @property integer $salon_staff_id
 * @property integer $action_type
 * @property integer $status
 * @property integer $salon_membertype_id
 * @property integer $salon_membertype_id_NEXT
 * @property string $reason
 * @property string $receipt_datetime
 * @property string $resume_date
 * @property string $comeback_date
 * @property string $cancel_date
 * @property integer $admin_id
 * @property string $reg_datetime
 * @property string $upd_datetime
 * @property string $memo
 */
class MemberAction extends \yii\db\ActiveRecord
{

    public $validationRules;
    public $createYear;
    public $createMonth;
    public $createDay;
    public $suspendedYear;
    public $suspendedMonth;
    public $suspendedDay;
    public $withdrewYear;
    public $withdrewMonth;
    public $withdrewDay;
    public $fukukaiYear;
    public $fukukaiMonth;
    public $fukukaiDay;
    public $poscd1;
    public $poscd2;
    public $poscd3;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member_action';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        if (!empty($this->validationRules)) {
            return $this->validationRules;
        } else {
            return [
                [['action_type'], 'required', 'message' => \Yii::t('app', 'validation is required')],
                $this->rulesTotal()
            ];
        }
    }

    /**
     * @Validator for all action
     * @Author Ha Huu Don (donhh6551@seta-asia.com.vn)
     */
    public function rulesTotal()
    {
        $ruleTotal = [
            [['member_id', 'salon_id', 'salon_staff_id', 'action_type', 'status', 'salon_membertype_id', 'salon_membertype_id_NEXT', 'admin_id'], 'integer'],
            [['createYear', 'createMonth', 'createDay', 'suspendedYear', 'suspendedMonth', 'suspendedDay', 'withdrewYear', 'withdrewMonth', 'withdrewDay', 'fukukaiYear', 'fukukaiMonth', 'fukukaiDay', 'receipt_datetime', 'resume_date', 'comeback_date', 'cancel_date', 'reg_datetime', 'upd_datetime'], 'safe'],
            [['memo'], 'string'],
            [['pos_member_cd', 'pos_member_cd_OLD'], 'string', 'max' => 13],
            [['reason'], 'string', 'max' => 15]
        ];
        
        return $ruleTotal[0];
    }
    
    /**
     * @Validator for Member Return (Action_type = 10 && 999)
     * @Author Ha Huu Don (donhh6551@seta-asia.com.vn)
     */
    public function setRule($action)
    {
        switch ($action) {
                case 10 : 
                            // Update receipt_datetime
                            $this->rulesForMemberDefault();
                    break;
                case 20 : 
                            $this->rulesForMemberReturn(); 
                    break;
                case 30 : 
                            $this->rulesForMemberSuppend(); 
                    break;
                case 40 : 
                            $this->rulesForMemberReturn(); 
                    break;
                case 90 : 
                            $this->rulesForMemberWithdrew(); 
                    break;
                case 999 : 
                            // Update receipt_datetime
                            $this->rulesForMemberClose();
                    break;
            }
    }

    /**
     * @Validator for Member Return (Action_type = 10)
     * @Author Ha Huu Don (donhh6551@seta-asia.com.vn)
     */
    public function rulesForMemberDefault()
    {
        $this->validationRules = [
            [['action_type', 'createYear', 'createMonth', 'createDay'], 'required', 'message' => \Yii::t('app', 'validation is required')],
            $this->rulesTotal()
        ];
    }

    /**
     * @Validator for Member Return (Action_type = 20)
     * @Author Ha Huu Don (donhh6551@seta-asia.com.vn)
     */
    public function rulesForMemberReturn()
    {
        $this->validationRules = [
            [['action_type', 'createYear', 'createMonth', 'createDay', 'fukukaiYear', 'fukukaiMonth', 'fukukaiDay'], 'required', 'message' => \Yii::t('app', 'validation is required')],
            [['salon_membertype_id_NEXT'], 'required', 'message' => \Yii::t('app', 'validation is required')],
            //[['fukukaiYear'], 'compare', 'compareAttribute'=>'createYear', 'operator'=>'>', 'message' => \Yii::t('app', 'fukukaiYear bigger createYear')],
            $this->rulesTotal()
        ];
    }
    /**
     * @Validator for Member Return (Action_type = 30)
     * @Author Ha Huu Don (donhh6551@seta-asia.com.vn)
     */
    public function rulesForMemberSuppend()
    {
        $this->validationRules = [
            [['action_type', 'createYear', 'createMonth', 'createDay', 'fukukaiYear', 'fukukaiMonth', 'fukukaiDay', 'suspendedYear', 'suspendedMonth', 'suspendedDay'], 'required', 'message' => \Yii::t('app', 'validation is required')],
            $this->rulesTotal()
        ];
    }
    
    /**
     * @Validator for Member Return (Action_type = 90)
     * @Author Ha Huu Don (donhh6551@seta-asia.com.vn)
     */
    public function rulesForMemberWithdrew()
    {
        $this->validationRules = [
            [['action_type', 'createYear', 'createMonth', 'createDay', 'withdrewYear', 'withdrewMonth', 'withdrewDay'], 'required', 'message' => \Yii::t('app', 'validation is required')],
            $this->rulesTotal()
        ];
    }
    
    /**
     * @Validator for Member Return (Action_type = 999)
     * @Author Ha Huu Don (donhh6551@seta-asia.com.vn)
     */
    public function rulesForMemberClose()
    {
        $this->validationRules = [
            [['action_type', 'createYear', 'createMonth', 'createDay', 'poscd1', 'poscd2', 'poscd3'], 'required', 'message' => \Yii::t('app', 'validation is required')],
            $this->rulesTotal()
        ];
    }

    public function validationDate($attribute, $date1, $date2){
        if(strtotime($date2) < strtotime($date1)){
            $this->addError($attribute,'Date 2 khong doc nho hon Date1');
            return false;
        }
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'member_action_id' => 'Member Action ID',
            'member_id' => 'Member ID',
            'pos_member_cd' => 'Pos Member Cd',
            'pos_member_cd_OLD' => 'Pos Member Cd  Old',
            'salon_id' => 'Salon ID',
            'salon_staff_id' => 'Salon Staff ID',
            'action_type' => '処理',
            'status' => 'Status',
            'salon_membertype_id' => 'Salon Membertype ID',
            'salon_membertype_id_NEXT' => '変更後の会員種別',
            'reason' => 'Reason',
            'receipt_datetime' => 'Receipt Datetime',
            'resume_date' => 'Resume Date',
            'comeback_date' => 'Comeback Date',
            'cancel_date' => 'Cancel Date',
            'admin_id' => 'Admin ID',
            'reg_datetime' => 'Reg Datetime',
            'upd_datetime' => 'Upd Datetime',
            'memo' => 'Memo',
            'createYear' => '受付日の年',
            'createMonth' => '受付日の月',
            'createDay' => '受付日の日',
            'suspendedYear' => '休会処理日の年',
            'suspendedMonth' => '休会処理日の月',
            'suspendedDay' => '休会処理日の日',
            'fukukaiYear' => '復会処理日の年',
            'fukukaiMonth' => '復会処理日の月',
            'fukukaiDay' => '復会処理日の日',
            'withdrewYear' => '退会処理日の年',
            'withdrewMonth' => '退会処理日の月',
            'withdrewDay' => '退会処理日の日',
            'poscd1' => 'POS会員コード1',
            'poscd2' => 'POS会員コード2',
            'poscd3' => 'POS会員コード3',
        ];
    }

    /**
     * description Get list Member history
     * Author Ha Huu Don(donhh6551@seta-asia.com.vn)
     * Date 30/01/2015
     * Update 30/01/2015
     */
    public function getListMemberHistory($id)
    {
        $query = new \yii\db\Query();
        $query->select(['*'])
                ->from($this->tableName())
                ->where(['member_id' => $id]);
        $command = $query->createCommand();
        return $command->queryAll();
    }

    /**
     * description Get Member history info by member_action_id
     * Author Ha Huu Don(donhh6551@seta-asia.com.vn)
     * Date 30/01/2015
     * Update 30/01/2015
     */
    public function getMemberActionInfo($member_action_id)
    {
        $query = new \yii\db\Query();
        $query->select(['*'])
                ->from($this->tableName())
                ->where(['member_action_id' => $member_action_id]);
        $command = $query->createCommand();
        return $command->queryOne();
    }
    
}