<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Teacher;

Class TeacherController extends Controller
{
    public function actionEntry()
    {
        $model = new Teacher();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            return $this->render('entry', ['model' => $model]);

        }
    }
}