<?php

class m160425_231307_alter_tourists extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tourists', 'partnerDiscont', 'INT DEFAULT 0');
		$this->addColumn('tourists', 'abonentDiscont', 'INT DEFAULT 0');
		$this->dropColumn('tourists', 'discont');
	}

	public function down()
	{
		$this->dropColumn('tourists', 'partnerDiscont');
		$this->dropColumn('tourists', 'abonentDiscont');
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