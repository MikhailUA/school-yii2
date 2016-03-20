<?php

use yii\db\Migration;

class m160320_163521_roles_in_user extends Migration
{
    public function up()
    {
        $this->addColumn('user','role','ENUM("user","teacher","student","admin") NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('user','role');
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
