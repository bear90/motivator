<?php

class m160920_200803_alter_tour_offer extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tour_offer', 'bookingPrepaymentRub', 'DECIMAL(15,2) NOT NULL DEFAULT 0');
	}

	public function down()
	{
		$this->dropColumn('tour_offer', 'bookingPrepaymentRub');
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