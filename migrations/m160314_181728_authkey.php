<?php

use yii\db\Migration;

class m160314_181728_authkey extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'authKey', $this->string(256));
    }

    public function down()
    {
        $this->dropColumn('user', 'authKey');
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
