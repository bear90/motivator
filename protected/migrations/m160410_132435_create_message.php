<?php

class m160410_132435_create_message extends CDbMigration
{
	public function up()
	{
		$this->createTable('message', [
			'id' => 'pk',
			'text' => 'TEXT',
			'touristId' => 'INT',
			'managerId' => 'INT',
			'createdAt' => 'TIMESTAMP',
		]);
	}

	public function down()
	{
		$this->dropTable('message');
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