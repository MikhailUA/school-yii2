
<?php

use yii\widgets\ActiveForm;


$form = ActiveForm::begin();

echo $form->field($model, 'firstName');
echo $form->field($model, 'lastName');
echo $form->field($model, 'email');
echo $form->field($model, 'createdAt');
echo $form->field($model, 'passwordHash')->input('password');

echo \yii\helpers\Html::submitButton();

ActiveForm::end();
