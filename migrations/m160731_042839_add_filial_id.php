<?php

use yii\db\Migration;

class m160731_042839_add_filial_id extends Migration
{
    public function up()
    {
        $this->addColumn('student','FilialID','integer(10) not null');
    }

    public function down()
    {
        echo "m160731_042839_add_filial_id cannot be reverted.\n";

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
