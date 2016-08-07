<?php

class m160807_225346_alter_tour_offer extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tour_offer', 'operatorId', 'INT');
		$this->addForeignKey('FK_tour_offer_operatorId',
			'tour_offer', array('operatorId'), 'touroperator', array('id'),
			'SET NULL',
			'SET NULL');
	}

	public function down()
	{
		$this->dropForeignKey('FK_tour_offer_operatorId', 'tour_offer');
		$this->dropColumn('tour_offer', 'operatorId');
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