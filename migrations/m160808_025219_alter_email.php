<?php

use yii\db\Migration;

class m160808_025219_alter_email extends Migration
{
    public function up()
    {
        $this->alterColumn('student','email','varchar(100) null');

    }

    public function down()
    {
        echo "m160808_025219_alter_email cannot be reverted.\n";

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
