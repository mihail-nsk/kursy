<?php

use yii\db\Migration;

class m160731_045214_add_subject_filial extends Migration
{
    public function up()
    {
        $this->addColumn('subject','FilialID','integer(10) not null');
    }

    public function down()
    {
        echo "m160731_045214_add_subject_filial cannot be reverted.\n";

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
