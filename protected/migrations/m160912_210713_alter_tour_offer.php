<?php

class m160912_210713_alter_tour_offer extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tours', 'wishes', 'TEXT');
		$this->addColumn('tour_offer', 'bookingEndDate', 'TIMESTAMP NULL');
	}

	public function down()
	{
		$this->dropColumn('tours', 'wishes');
		$this->dropColumn('tour_offer', 'bookingEndDate');
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