<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;



Class UserSearch extends User{
    public function rules(){
        return [
            [['firstName','lastName','email'],'safe']
        ];
    }

    public function scenarios(){
        return ActiveRecord::scenarios();
    }

    public function search($params){

        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // load the search form data and validate
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // adjust the query by adding the filters
        $query->andFilterWhere(['like','firstName', $this->firstName]);
        $query->andFilterWhere(['like','lastName', $this->lastName]);
        $query->andFilterWhere(['like','email', $this->email]);

        return $dataProvider;
    }

}