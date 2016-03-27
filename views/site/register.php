<script src='https://www.google.com/recaptcha/api.js'></script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin();

echo $form->field($model,'firstName');
echo $form->field($model,'lastName');
echo $form->field($model,'email');
echo $form->field($model,'passwordHash')->passwordInput()->label('Password');
echo $form->field($model,'passwordConfirm')->passwordInput()->label('Password Confirm');
echo $form->field($model, 'role')->dropDownList(['user'=>'user','teacher'=>'teacher','student'=>'student','admin'=>'admin']);
?>
<div class="g-recaptcha" data-sitekey="6LdH0xsTAAAAAIomDO8evVuLLkKkB4xW-lxGcRrW"></div>
<?php
echo Html::submitButton('Submit');

$form = ActiveForm::end();
