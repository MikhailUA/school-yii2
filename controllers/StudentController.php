<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Student;

Class StudentController extends Controller
{
    public function actionEntry()
    {
        $model = new Student();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            return $this->render('entry', ['model' => $model]);

        }
    }
}