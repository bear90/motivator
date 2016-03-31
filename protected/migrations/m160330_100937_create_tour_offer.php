<?php

class m160330_100937_create_tour_offer extends CDbMigration
{
	public function up()
	{
		$this->createTable('tour_offer', [
			'id' => 'pk',
			'tourId' => 'INT NOT NULL',
			'price' => 'INT NOT NULL',
			'startDate' => 'TIMESTAMP NULL',
			'endDate' => 'TIMESTAMP NULL',
			'description' => 'TEXT'
		]);
	}

	public function down()
	{
		$this->dropTable('tour_offer');
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