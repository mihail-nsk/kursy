<?php

use yii\db\Migration;

class m160816_115134_change_tables extends Migration
{
    public function up()
    {
        $this->dropIndex('phone','student');
        $this->addColumn('expenses','Date','date default null');
        $this->addColumn('expenses','People','Tinyint(4) default null');
    }

    public function down()
    {
        echo "m160816_115134_change_tables cannot be reverted.\n";

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
