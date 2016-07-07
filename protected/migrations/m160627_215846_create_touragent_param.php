<?php

class m160627_215846_create_touragent_param extends CDbMigration
{
	public function up()
	{
		$this->createTable('touragent_param', [
			'id' => 'pk',
			'touragentId' => 'INT',
			'week' => 'int',
			'year' => 'int',
			'maxDiscount' => 'INT',
			'minDiscount' => 'INT'
		]);
		$this->addForeignKey('FK_touragent_param_touragentId', 'touragent_param', array('touragentId'), 'touragents', array('id'), 
			'CASCADE', 
			'CASCADE');
	}

	public function down()
	{
		$this->dropTable('touragent_param');
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