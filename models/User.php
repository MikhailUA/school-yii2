<?php

namespace app\models;

use yii\db\ActiveRecord;

Class User extends ActiveRecord{

    public $passwordConfirm;

    public static function tableName () {
        return 'user';
    }

    public function rules(){
        return[
            [['email','firstName','lastName','passwordHash','passwordConfirm','role'],'required'],
            ['email','email'],
          //  [['createdAt','updatedAt'],'safe'],
            ['passwordConfirm','compare','compareAttribute' => 'passwordHash','message' => 'пароли не совпадают']
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord){
                $this->passwordHash=\Yii::$app->security->generatePasswordHash($this->passwordHash);
                $this->createdAt=date('Y-m-d H:i:s');
                $this->updatedAt=date('Y-m-d H:i:s');
            }
            return true;
        } else {
            $this->updatedAt=date('Y-m-d H:i:s');
            return false;
        }
    }



}