<?php

class m160403_202612_alert_tour_offer extends CDbMigration
{
	

	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->addColumn('tour_offer', 'country', 'VARCHAR(50)');
		$this->addColumn('tour_offer', 'city', 'VARCHAR(50)');
	}

	public function safeDown()
	{
		$this->dropColumn('tour_offer', 'country');
		$this->dropColumn('tour_offer', 'city');
	}
	
}