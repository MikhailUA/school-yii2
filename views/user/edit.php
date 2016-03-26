<h1>Edit User</h1>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);

echo $form->field($model, 'firstName');
echo $form->field($model, 'lastName');
echo $form->field($model, 'email');
echo $form->field($model, 'imageFile')->fileInput();
echo $form->field($model, 'role')->dropDownList(['user' => 'user', 'teacher' => 'teacher', 'student' => 'student', 'admin' => 'admin']);
echo Html::submitButton('Submit');

$form = ActiveForm::end();