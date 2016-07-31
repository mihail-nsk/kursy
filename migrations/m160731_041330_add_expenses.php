<?php

use yii\db\Migration;

class m160731_041330_add_expenses extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%expenses}}', [
            'ExpensesID' => $this->primaryKey(),
            'Expenses' => $this->string(300)->notNull(),
            'UserID' => $this->integer(10)->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m160731_041330_add_expenses cannot be reverted.\n";

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
