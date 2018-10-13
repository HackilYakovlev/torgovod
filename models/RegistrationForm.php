<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RegistrationForm is the model behind the login form.
 */
class RegistrationForm extends Model
{
    public $surname;
    public $name;
    public $secondname;
    public $email;
    public $phone;
    public $password;
    public $tariff;
    public $rememberMe = true;

    private $_user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['name', 'surname', 'secondname', 'email', 'phone', 'password', 'tariff'], 'required'],
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
                $this->addError($attribute, 'Неправильный email или пароль');
            }
        }
    }

    public function attributeLabels()
    {
        return [
            'surname' => 'Фамилия*',
            'secondname' => 'Отчество*',
            'name' => 'Имя*',
            'email' => 'Email*',
            'phone' => 'Телефон*',
            'password' => 'Пароль*',
            'tariff' => 'Тариф',
            'rememberMe' => 'Запомнить меня',
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }
}
