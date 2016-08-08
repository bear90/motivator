<?php

class m160808_210328_alter_tourist_tour extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tourist_tour', 'createdAt', 'TIMESTAMP NULL');
	}

	public function down()
	{
		$this->dropColumn('tourist_tour', 'createdAt');
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