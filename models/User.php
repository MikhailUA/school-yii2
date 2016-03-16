<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\HttpException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $email
 * @property string $firstName
 * @property string $lastName
 * @property string $passwordHash
 * @property string $createdAt
 * @property string $updatedAt
 * @property string $authKey
 */
class User extends ActiveRecord implements IdentityInterface {

    public $passwordConfirm;

    public static function findIdentity($id) {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new HttpException(500);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function rules() {
        return [
            [['firstName', 'lastName', 'email', 'passwordHash', 'createdAt', 'updatedAt'], 'safe', 'on' => 'safe'],
            [['firstName', 'lastName', 'email', 'passwordHash', 'passwordConfirm'], 'required', 'on' => ['register', ]],
            ['email', 'email'],
            ['passwordHash', 'string', 'min' => 3, 'on' => 'register'],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'passwordHash', 'on' => 'register', 'message' => 'Пароли не совпадают!'],
            ['email', 'unique', 'on' => 'register'],
            //['sex', 'in', 'range' => ['male', 'female'], 'on' => 'register'],
        ];
    }

    public function beforeSave($insert) {
        if($insert) {
            $this->createdAt = date('Y-m-d H:i:s');
            $this->passwordHash = \Yii::$app->security->generatePasswordHash($this->passwordHash);
            $this->authKey = \Yii::$app->security->generateRandomString();
        }

        $this->updatedAt = date('Y-m-d H:i:s');

        return parent::beforeSave($insert);
    }


    public static function tableName() {
        return 'user';
    }

    public function attributeLabels() {
        return [
            'passwordHash' => 'Password'
        ];
    }
}