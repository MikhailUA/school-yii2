<?php

use yii\db\Migration;

class m160326_183458_avatar extends Migration
{
    public function up()
    {
        $this->addColumn('user','avatar','varchar(255)');
    }

    public function down()
    {
        $this->dropColumn('user','avatar');
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
