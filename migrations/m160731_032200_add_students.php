<?php

use yii\db\Migration;

class m160731_032200_add_students extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%student}}', [
            'StudentID' => $this->primaryKey(),
            'FirstName' => $this->string(32)->notNull(),
            'LastName' => $this->string(32)->notNull(),
            'MiddleName' => $this->string(32),
            'Phone' => $this->string(32)->unique(),
            'Email' => $this->string(32)->unique(),
            'Class' => $this->integer(10)->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%student}}');
    }
}
