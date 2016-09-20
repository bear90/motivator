<?php

class m160920_211218_alter_tourist_tour extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tourist_tour', 'paidAt', 'TIMESTAMP NULL');
	}

	public function down()
	{
		$this->dropColumn('tourist_tour', 'paidAt');
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