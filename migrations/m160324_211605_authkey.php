<?php

use yii\db\Migration;

class m160324_211605_authkey extends Migration
{
    public function up()
    {
        $this->addColumn('user','authkey','varchar(255) not null');
    }

    public function down()
    {
        $this->dropColumn('user','authkey');
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
