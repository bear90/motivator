<?php

class m160401_172649_alert_tourists extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('tourists', 'tourCity');
		$this->addColumn('tourists', 'offerId', 'INT');
		$this->addForeignKey('FK_tourists_offerId', 'tourists', array('offerId'), 'tour_offer', array('id'), 
			'SET NULL', 
			'SET NULL');
	}

	public function down()
	{
		$this->dropColumn('tourists', 'offerId');
		$this->dropForeignKey('FK_tourists_offerId', 'tourists');
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