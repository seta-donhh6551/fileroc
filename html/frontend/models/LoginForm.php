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
class LoginForm extends \yii\db\ActiveRecord
{

    public $login_id;
    public $member_pw;
    public $rememberMe = true;
    private $_user = false;

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
            ['login_id', 'required', 'message' => 'ログインIDが入力してください。'],
            ['member_pw', 'required', 'message' => 'パスワードが入力してください。'],
            [['reg_datetime', 'upd_datetime'], 'safe'],
            [['memo'], 'string'],
            [['login_id', 'member_pw', 'member_email'], 'string', 'max' => 255],
                //['member_pw', 'validatePasswords'],
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

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePasswords($attribute, $params)
    {
        if (!$this->hasErrors()) {

            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->member_pw)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function checkLogin()
    {

        $User = Account::findByLoginID($this->login_id, $this->member_pw);
        if ($User) {
            return Yii::$app->user->login($User, $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            $this->addError($this->member_pw, 'ログインIDもしくはパスワードが正しくありません');
            return false;
        }
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[login_id]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Account::findByLoginID($this->login_id);
        }
        return $this->_user;
    }

}