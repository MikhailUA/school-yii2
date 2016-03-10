<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
<!--    <form method="POST">-->
<!--        <input name="hello" type="text">-->
<!--        <input name="_csrf" type="hidden" value="--><?php //echo Yii::$app->request->getCsrfToken()?><!--" >-->
<!--        <input type="submit">-->
<!--    </form>-->

    <?php
        $form = \yii\widgets\ActiveForm::begin([
            'enableClientValidation' => false,
        ]);

        echo $form->field($model, 'name', [
            //'template' => "{input}\n{label}\n{hint}\n{error}"
        ])->input('text', [
            'placeholder' => 'Very cool name'
        ]);

    echo $form->field($model, 'email');

        echo $form->field($model, 'text')->textarea([
            'rows' => 3,
        ]);

        ?>
            <input type="submit">
    <?php

        \yii\widgets\ActiveForm::end();
    ?>
</div>
