<?php

use yii\db\Migration;

class m160731_030317_add_user_role extends Migration
{
    public function up()
    {
        $this->addColumn('user','role','varchar(50) not null default "user"');
    }

    public function down()
    {
        echo "m160731_030317_add_user_role cannot be reverted.\n";

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
