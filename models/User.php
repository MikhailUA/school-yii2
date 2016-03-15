<?php

namespace app\models;

use yii\db\ActiveRecord;

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
class User extends ActiveRecord {

    public function rules() {
        return [
            ['createdAt', 'required'],
            [['firstName', 'lastName', 'email', 'passwordHash', 'createdAt', 'updatedAt'], 'safe'],
        ];
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