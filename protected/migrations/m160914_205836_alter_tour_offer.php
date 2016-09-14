<?php

class m160914_205836_alter_tour_offer extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tour_offer', 'bookingPrepayment', 'DECIMAL(15,2) NOT NULL DEFAULT 0');
		$this->addColumn('tourist_tour', 'bookingPrepaymentPaid', 'DECIMAL(15,2) NOT NULL DEFAULT 0');
		
	}

	public function down()
	{
		$this->dropColumn('tour_offer', 'bookingPrepayment');
		$this->dropColumn('tourist_tour', 'bookingPrepaymentPaid');
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