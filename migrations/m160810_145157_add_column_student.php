<?php

use yii\db\Migration;

class m160810_145157_add_column_student extends Migration
{
    public function up()
    {
        $this->dropColumn('student','email');
        $this->addColumn('student','Email','varchar(255) NULL');
        $this->addColumn('student','Date','Date NULL');
        $this->addColumn('student','link','varchar(255) NULL');
        $this->addColumn('student','source','varchar(255) NULL');
        $this->addColumn('student','manager','varchar(255) NULL');
    }

    public function down()
    {
        echo "m160810_145157_add_column_student cannot be reverted.\n";

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
