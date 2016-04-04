<?php

class m160403_202612_alert_tour_offer extends CDbMigration
{
	

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->addColumn('tour_offer', 'country', 'VARCHAR(50)');
		$this->addColumn('tour_offer', 'city', 'VARCHAR(50)');
		$this->addForeignKey('FK_tour_offer_tourId', 'tour_offer', array('tourId'), 'tours', array('id'), 
			'CASCADE', 
			'CASCADE');
	}

	public function safeDown()
	{
		$this->dropColumn('tour_offer', 'country');
		$this->dropColumn('tour_offer', 'city');
		$this->dropForeignKey('FK_tour_offer_tourId', 'tour_offer');
	}
	
}