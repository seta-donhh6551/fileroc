<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{

    public $username;
    public $password;
    public $rememberMe = true;
    private $_user = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username'], 'required', 'message' => \Yii::t('app', 'validation required')],
            [['password'], 'required', 'message' => \Yii::t('app', 'validation required')],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, \Yii::t('app', 'Username or password is incorrect'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = AdminUser::findByUsername($this->username);
        }

        return $this->_user;
    }

    /**
     * attributeLabels
     *
     * @author Ha Huu Don <donhh6551@seta-asia.com.vn>
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Tên đăng nhập',
            'password' => 'Mật khẩu',
            'rememberMe' => Yii::t('admin', 'Remember Me'),
        ];
    }

}
