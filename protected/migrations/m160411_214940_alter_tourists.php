<?php

class m160411_214940_alter_tourists extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tourists', 'counterStartedAt', 'TIMESTAMP');
	}

	public function down()
	{
		$this->dropColumn('tourists', 'counterStartedAt');
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