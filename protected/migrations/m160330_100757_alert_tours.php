<?php

class m160330_100757_alert_tours extends CDbMigration
{
	public function up()
	{
		$this->dropColumn('tours', 'offer');
	}

	public function down()
	{
		echo "m160330_100757_alert_tours does not support migration down.\n";
		return false;
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