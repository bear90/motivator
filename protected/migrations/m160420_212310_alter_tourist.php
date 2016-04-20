<?php

class m160420_212310_alter_tourist extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tourists', 'discont', 'INT DEFAULT 0');
	}

	public function down()
	{
		$this->dropColumn('tourists', 'discont');
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