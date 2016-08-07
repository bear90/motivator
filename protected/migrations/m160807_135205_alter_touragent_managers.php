<?php

class m160807_135205_alter_touragent_managers extends CDbMigration
{
	public function up()
	{
		$this->addColumn('touragent_managers', 'description', 'TEXT');
	}

	public function down()
	{
		$this->dropColumn('touragent_managers', 'description');
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