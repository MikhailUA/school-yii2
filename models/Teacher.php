<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/*class Teacher extends Model
{
    public $firstname;
    public $lastname;
    public $email;
    public $faculty;

    public function rules()
    {
        return [
            [['firstname', 'lastname', 'faculty'], 'required'],
            ['email', 'email']
        ];
    }
}*/

class Teacher extends ActiveRecord{

    public function rules()
    {
        return [
            [['firstname', 'lastname', 'faculty'], 'required'],
            ['email', 'email']
        ];
    }
}

