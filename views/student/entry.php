<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<p>Register a student</p>

<?php $form = ActiveForm::begin();?>
    <?= $form->field($model,'firstname');?>
    <?= $form->field($model,'lastname');?>
    <?= $form->field($model,'email');?>
    <?= $form->field($model,'faculty');?>
    <?= Html::submitButton('Submit');?>

<?php $form = ActiveForm::end();?>

