<?php

use yii\db\Migration;

class m160320_172950_roles_user_default extends Migration
{
    public function up()
    {
        $this->alterColumn('user','role','ENUM("user","teacher","student","admin") NOT NULL DEFAULT "user"');
    }

    public function down()
    {
        $this->alterColumn('user','role','ENUM("user","teacher","student","admin") NOT NULL');

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
