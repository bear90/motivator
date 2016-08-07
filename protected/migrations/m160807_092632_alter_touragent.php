<?php

class m160807_092632_alter_touragent extends CDbMigration
{
	public function up()
	{
		$this->addColumn('touragents', 'address', 'VARCHAR(255)');
		$this->addColumn('touragents', 'logo', 'VARCHAR(255)');
	}

	public function down()
	{
		$this->dropColumn('touragents', 'address');
		$this->dropColumn('touragents', 'logo');
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