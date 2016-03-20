<<<<<<< HEAD
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

    <p>Register a teacher</p>

<?php $form = ActiveForm::begin();?>
<?= $form->field($model,'firstname');?>
<?= $form->field($model,'lastname');?>
<?= $form->field($model,'email');?>
<?= $form->field($model,'faculty');?>
<?= Html::submitButton('Submit');?>

<?php $form = ActiveForm::end();?>
=======

<?php

use yii\widgets\ActiveForm;


$form = ActiveForm::begin();

echo $form->field($model, 'firstName');
echo $form->field($model, 'lastName');
echo $form->field($model, 'email');
echo $form->field($model, 'passwordHash')->input('password');
echo $form->field($model, 'passwordConfirm')->input('password');
//echo $form->field($model, 'sex')->dropDownList(['male' => 'Мужчина', 'female' => 'Женщина', 'оnо' => 'ono']);

echo \yii\helpers\Html::submitButton();

ActiveForm::end();
>>>>>>> 887487f829de680a77a375d26748ab4f9c3185d0
