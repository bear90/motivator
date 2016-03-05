<?php

class m160305_202133_values_configuration extends CDbMigration
{
	public function up()
	{
		$this->insert('configuration', array('name' => 'ORDER_TOUR_TIMER', 'type' => 'integer', 'value' => '5'));
	}

	public function down()
	{
		$this->delete('configuration', 'name="ORDER_TOUR_TIMER"');
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