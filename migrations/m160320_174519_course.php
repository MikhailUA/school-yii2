<?php

use yii\db\Migration;

class m160320_174519_course extends Migration
{
    public function up()
    {
        $this->createTable('course',[
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'hours' => $this->integer()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('course');
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
