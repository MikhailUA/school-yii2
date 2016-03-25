<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

Class User extends ActiveRecord implements IdentityInterface{

    public $passwordConfirm;
    public $rememberMe;
    public $password;

    public static function tableName () {
        return 'user';
    }

    public function rules(){
        return[
            [['email','firstName','lastName','passwordHash','passwordConfirm','role'],'required'],
            ['email','email'],
            ['passwordConfirm','compare','compareAttribute' => 'passwordHash','message' => 'пароли не совпадают'],
            [['firstName','password'],'required','on' => 'login'],
            ['password','validatePassword','on' => 'login'],
            ['rememberMe', 'boolean', 'on' => 'login']
        ];
    }

    public function validatePassword($attribute, $params){
        if ($user=User::findOne(['firstName' => $this->firstName])){
            if (Yii::$app->security->validatePassword($this->password,$user->passwordHash)){
                return true;
            }else{
                $this->addError($attribute, 'Incorrect username or password');
            }
        }
    }

    public function login (){
        if ($this->validate()){
            return Yii::$app->user->login($this->getUser, $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    public function getUser(){
        return User::findOne(['firstName'=>$this->firstName]);
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord){
                $this->authkey = \Yii::$app->security->generateRandomString();
                //$this->passwordHash=\Yii::$app->security->generatePasswordHash($this->passwordHash);
                $this->createdAt=date('Y-m-d H:i:s');
                $this->updatedAt=date('Y-m-d H:i:s');
            }
            return true;
        } else {
            $this->updatedAt=date('Y-m-d H:i:s');
            return false;
        }


/*        if($insert) {
            $this->createdAt = date('Y-m-d H:i:s');
            $this->passwordHash = \Yii::$app->security->generatePasswordHash($this->passwordHash);
            $this->authkey = \Yii::$app->security->generateRandomString();
        }

        $this->updatedAt = date('Y-m-d H:i:s');

        return parent::beforeSave($insert);*/
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }


}