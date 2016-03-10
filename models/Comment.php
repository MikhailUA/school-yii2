<?php

namespace app\models;

use yii\base\Model;

class Comment extends Model {
    public $email;
    public $name;
    public $text;

    public function rules() {
        return [
            [['email', 'name', 'text'], 'required'],
            ['email', 'email'],
            ['name', 'string', 'min' => 3, 'tooShort' => 'Go away!'],
//            ['name', 'required'],
//            ['text', 'required'],
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
            'text' => 'Текст комментария'
        ];
    }
}