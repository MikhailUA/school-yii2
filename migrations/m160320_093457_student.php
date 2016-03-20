<?php

use yii\db\Migration;

class m160320_093457_student extends Migration
{
    public function up()
    {
        $this->createTable('student',[
           'id' => $this->primaryKey(),
            'firstname' => $this->string(255)->notNull(),
            'lastname' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'faculty' => $this->string(255)->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('student');
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
