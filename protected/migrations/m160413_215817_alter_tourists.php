<?php

class m160413_215817_alter_tourists extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tourists', 'tourFinishAt', 'TIMESTAMP');
	}

	public function down()
	{
		$this->dropColumn('tourists', 'tourFinishAt');
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