<?php

namespace app\controllers;

use yii;
use yii\web\Controller;
use app\models\User;
use app\models\UserSearch;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

Class UserController extends Controller
{
    public function actionList()
    {
        $query = User::find();
        $provider = new ActiveDataProvider([
            'query' => $query
        ]);

        $searchModel = new UserSearch();

        if (Yii::$app->request->get()){
            $provider = $searchModel->search(Yii::$app->request->get());
        }

        return $this->render('list', [
            'provider' => $provider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionEdit($id)
    {

        if ($user = User::findOne($id)) {
            $user->scenario = 'edit';

            if ($user->load(\Yii::$app->request->post())) {

                if ($user->imageFile = UploadedFile::getInstance($user, 'imageFile')) {
                    $user->upload();
                }

                $user->save();
                return $this->redirect(['/user/list']);
            }

            return $this->render('edit', [
                'model' => $user]);
        }
    }

    public function actionDelete($id)
    {
        $user = User::findOne($id);
        $user->delete();

        return $this->redirect('list');
    }

}