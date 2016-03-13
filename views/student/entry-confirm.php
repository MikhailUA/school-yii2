<?php
use yii\helpers\Html;
?>

<p>Student Added</p>

<p>
    <?= Html::encode($model->firstname); ?></br>
    <?= Html::encode($model->lastname); ?></br>
    <?= Html::encode($model->email); ?></br>
    <?= Html::encode($model->faculty); ?></br>

</p>
