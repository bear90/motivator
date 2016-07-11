<?php

class m160711_154927_create_template extends CDbMigration
{
	public function up()
	{
		$this->createTable('template', [
			'id' => 'pk',
			'key' => 'VARCHAR(50)',
			'content' => 'TEXT',
			'comment' => 'varchar(255)',
			'updatedAt' => 'TIMESTAMP NULL',
		]);
	}

	public function down()
	{
		$this->dropTable('template');
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