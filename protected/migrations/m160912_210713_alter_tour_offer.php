<?php

class m160912_210713_alter_tour_offer extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tours', 'wishes', 'TEXT');
	}

	public function down()
	{
		$this->dropColumn('tours', 'wishes');
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