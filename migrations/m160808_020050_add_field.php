<?php

use yii\db\Migration;

class m160808_020050_add_field extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->addColumn('student','Comment','text');
        $this->createTable('{{%student_subject}}', [
            'ID' => $this->primaryKey(),
            'StudentID' => $this->integer(10)->notNull(),
            'SubjectID' => $this->integer(10)->notNull(),
        ], $tableOptions);

    }

    public function down()
    {
        echo "m160808_020050_add_field cannot be reverted.\n";

        return false;
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
