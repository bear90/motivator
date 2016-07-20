<?php

class m160720_144501_alter_tour_offer extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tour_offer', 'paymentEndDate', 'TIMESTAMP NULL');
	}

	public function down()
	{
		$this->dropColumn('tour_offer', 'paymentEndDate');
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