<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\grid\ActionColumn;

echo GridView::widget([
    'dataProvider' => $provider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        //'id',
        'firstName',
        'lastName',
        'email',
        'role',
        'avatar',
/*        [
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
        ],*/
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Actions',
            'template' => '{update} {delete}',
            'buttons' => [
                'update' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('yii', 'Update'),
                        'aria-label' => Yii::t('yii', 'Update'),
                        'data-pjax' => '0',
                    ];
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['/user/edit', 'id' => $model->id], $options);
                },
                'delete' => function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('yii', 'Delete'),
                        'aria-label' => Yii::t('yii', 'Delete'),
                        'data-pjax' => '0',
                    ];
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['/user/delete', 'id' => $model->id], $options);
                }
            ],

        ]
    ]
]);

