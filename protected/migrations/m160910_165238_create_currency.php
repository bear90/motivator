<?php

class m160910_165238_create_currency extends CDbMigration
{
	public function up()
	{
		$this->createTable('currency',array(
            'id' => 'pk',
            'key' => 'varchar(3) NOT NULL',
            'value' => 'DECIMAL(15,4) NOT NULL DEFAULT 0',
            'updatedAt' => 'TIMESTAMP',
        ));
	}

	public function down()
	{
		$this->dropTable('currency');
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