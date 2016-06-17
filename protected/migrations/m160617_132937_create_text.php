<?php

class m160617_132937_create_text extends CDbMigration
{
    public function up()
    {
        $this->createTable('text', [
            'id' => 'pk',
            'key' => 'VARCHAR(50)',
            'comment' => 'VARCHAR(255)',
            'text' => 'TEXT',
            'createdAt' => 'TIMESTAMP',
            'updatedAt' => 'TIMESTAMP NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('text');
    }

    /*
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}