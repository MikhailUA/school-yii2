<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Student extends Model
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
}