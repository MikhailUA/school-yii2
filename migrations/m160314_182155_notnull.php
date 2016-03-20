<?php

use yii\db\Migration;

class m160314_182155_notnull extends Migration
{
    public function up()
    {
        $this->alterColumn('user', 'firstName', $this->string(256)->notNull());
        $this->alterColumn('user', 'lastName', $this->string(512)->notNull());
        $this->alterColumn('user', 'email', $this->string(256)->notNull());
        $this->alterColumn('user', 'createdAt', $this->dateTime()->notNull());
        $this->alterColumn('user', 'updatedAt', $this->dateTime()->notNull());
    }

    public function down()
    {
        $this->alterColumn('user', 'firstName', $this->string(256));
        $this->alterColumn('user', 'lastName', $this->string(512));
        $this->alterColumn('user', 'email', $this->string(256));
        $this->alterColumn('user', 'createdAt', $this->dateTime());
        $this->alterColumn('user', 'updatedAt', $this->dateTime());
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
