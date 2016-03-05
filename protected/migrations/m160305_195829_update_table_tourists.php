<?php

class m160305_195829_update_table_tourists extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tourists', 'createdAt', 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
	}

	public function down()
	{
		$this->dropColumn('tourists', 'createdAt');
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