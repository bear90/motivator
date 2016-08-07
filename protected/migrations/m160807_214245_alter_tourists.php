<?php

class m160807_214245_alter_tourists extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tourists', 'deleted', 'TINYINT NULL DEFAULT 0');
		$this->createIndex('IDX_tourists_deleted', 'tourists', 'deleted');
	}

	public function down()
	{
		$this->dropIndex('IDX_tourists_deleted', 'tourists');
		$this->dropColumn('tourists', 'deleted');
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