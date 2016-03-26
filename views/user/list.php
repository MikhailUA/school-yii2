<?php

use yii\grid\GridView;
use yii\helpers\Html;

echo GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'firstName',
        'lastName',
        'email',
        'role',
        'avatar',
        [
            'header' => 'Edit',
            'content' => function ($model) {
                return \yii\bootstrap\Html::a('Edit', ['/user/edit', 'id' => $model->id]);
            }
        ],
        [
            'header' => 'Delete',
            'content' => function ($model) {
                return \yii\bootstrap\Html::a('Delete', ['/user/delete', 'id' => $model->id]);
            }
        ],
    ]
]);

