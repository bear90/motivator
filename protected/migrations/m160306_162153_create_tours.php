<?php

class m160306_162153_create_tours extends CDbMigration
{
	public function up()
	{
		$this->createTable('touragents', array(
			'id' => 'pk',
			'name' => 'VARCHAR(100) NOT NULL',
			'site' => 'VARCHAR(100)',
		));

		$this->createTable('tours', array(
			'id' => 'pk',
			'touristId' => 'INT NOT NULL',
			'touragentId' => 'INT',
			'startDate' => 'TIMESTAMP NOT NULL',
			'endDate' => 'TIMESTAMP NOT NULL',
		));

		$this->createTable('tour_cities', array(
			'id' => 'pk',
			'tourId' => 'INT NOT NULL',
			'city' => 'VARCHAR(100)'
		));


	}

	public function down()
	{
		$this->dropTable('tour_cities');
		$this->dropTable('touragents');
		$this->dropTable('tours');
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