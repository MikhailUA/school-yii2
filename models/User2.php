<?php

namespace app\models;

use Yii;

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
class User2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'firstName', 'lastName', 'createdAt', 'updatedAt'], 'required'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['email', 'firstName', 'passwordHash', 'authKey'], 'string', 'max' => 256],
            [['lastName'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'passwordHash' => 'Password Hash',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
            'authKey' => 'Auth Key',
        ];
    }
}
