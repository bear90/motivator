<?php

class m160807_220134_alter_tourist_tour extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tourist_tour', 'operatorId', 'INT');
		$this->addForeignKey('FK_tourist_tour_operatorId',
			'tourist_tour', array('operatorId'), 'touroperator', array('id'),
			'SET NULL',
			'SET NULL');
	}

	public function down()
	{
		$this->dropForeignKey('FK_tourist_tour_operatorId', 'tourist_tour');
		$this->dropColumn('tourist_tour', 'operatorId');
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