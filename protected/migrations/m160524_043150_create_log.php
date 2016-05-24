<?php

class m160524_043150_create_log extends CDbMigration
{
	public function up()
	{
		$this->createTable('logs', [
			'id' => 'pk',
			'status' => 'varchar(50)',
			'label' => 'varchar(255)',
			'text' => 'TEXT',
			'createdAt' => 'TIMESTAMP',
		]);
	}

	public function down()
	{
		$this->dropTable('logs');
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