<?php

class m160326_191940_alter_tour extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tours', 'offer', 'TEXT');
		$this->addColumn('tours', 'managerId', 'INT');
		$this->addForeignKey('FK_tours_managerId', 'tours', array('managerId'), 'touragent_managers', array('id'), 
			'SET NULL', 
			'SET NULL');
	}

	public function down()
	{
		$this->dropColumn('tours', 'offer');
		$this->dropColumn('tours', 'managerId');
		$this->dropForeignKey('FK_tours_managerId', 'tours');
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