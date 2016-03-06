<?php

class m160306_170509_crete_fk_tours extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('FK_tours_touristId', 'tours', array('touristId'), 'tourists', array('id'), 
			'CASCADE', 
			'CASCADE');
		
		$this->addForeignKey('FK_tours_touragentId', 'tours', array('touragentId'), 'touragents', array('id'), 
			'SET NULL', 
			'SET NULL');

		$this->addForeignKey('FK_tour_cities_tourId', 'tour_cities', array('tourId'), 'tours', array('id'), 
			'CASCADE', 
			'CASCADE');
	}

	public function down()
	{
		$this->dropForeignKey('FK_tours_touristId', 'tours');
		$this->dropForeignKey('FK_tours_touragentId', 'tours');
		$this->dropForeignKey('FK_tour_cities_tourId', 'tour_cities');
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