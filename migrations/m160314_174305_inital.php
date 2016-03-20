<?php

use yii\db\Migration;

class m160314_174305_inital extends Migration
{
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' => $this->string(256),
            'firstName' => $this->string(256),
            'lastName' => $this->string(512),
            'passwordHash' => $this->string(256),
            'createdAt' => $this->dateTime(),
            'updatedAt' => $this->dateTime(),
        ]);

        $this->insert('user', [
            'firstName' => 'Vasia',
            'lastName' => 'Pupkin',
            'email' => 'admin@amdin.com',
            'passwordHash' => Yii::$app->security->generatePasswordHash('123456'),
            'createdAt' => date('Y-m-d H:i:s'),
            'updatedAt' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
