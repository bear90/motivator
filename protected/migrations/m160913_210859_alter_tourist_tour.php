<?php

class m160913_210859_alter_tourist_tour extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tourist_tour', 'bookingPrepayment', 'DECIMAL(15,2) NOT NULL DEFAULT 0');
		$this->addColumn('tourist_tour', 'bookingEndDate', 'TIMESTAMP NULL');
		$this->addColumn('tourist_tour', 'paymentEndDate', 'TIMESTAMP NULL');
	}

	public function down()
	{
		$this->dropColumn('tourist_tour', 'bookingPrepayment');
		$this->dropColumn('tourist_tour', 'bookingEndDate');
		$this->dropColumn('tourist_tour', 'paymentEndDate');
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