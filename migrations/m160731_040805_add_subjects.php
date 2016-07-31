<?php

use yii\db\Migration;

class m160731_040805_add_subjects extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%subject}}', [
            'SubjectID' => $this->primaryKey(),
            'Subject' => $this->string(32)->notNull(),
            'TeacherID' => $this->integer(10)->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m160731_040805_add_subjects cannot be reverted.\n";

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
