<?php

class m160410_101330_alter_touraget_managers extends CDbMigration
{
	public function up()
	{
		$this->addColumn('touragent_managers', 'boss', 'TINYINT NOT NULL DEFAULT 0');
	}

	public function down()
	{
		$this->dropColumn('touraget_managers', 'boss');
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