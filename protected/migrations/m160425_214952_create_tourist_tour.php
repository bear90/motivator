<?php

class m160425_214952_create_tourist_tour extends CDbMigration
{
	public function up()
	{
		$this->createTable('tourist_tour', [
			'id' => 'pk',
			'touristId' => 'INT',
			'managerId' => 'INT',
			'touragentId' => 'INT',
			'prepayment' => 'INT NOT NULL',
			'price' => 'INT NOT NULL',
			'startDate' => 'TIMESTAMP NULL',
			'endDate' => 'TIMESTAMP NULL',
			'description' => 'TEXT',
			'country' => 'VARCHAR(50)',
			'city' => 'VARCHAR(50)'
		]);
		$this->addForeignKey('FK_tourist_tour_touristId', 'tourist_tour', array('touristId'), 'tourists', array('id'), 
			'CASCADE', 
			'CASCADE');
		$this->addForeignKey('FK_tourist_tour_managerId', 'tourist_tour', array('managerId'), 'touragent_managers', array('id'), 
			'SET NULL', 
			'SET NULL');
		$this->addForeignKey('FK_tourist_tour_touragentId', 'tourist_tour', array('touragentId'), 'touragents', array('id'), 
			'RESTRICT', 
			'RESTRICT');
	}

	public function down()
	{
		$this->dropTable('tourist_tour');
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