<?php

class m160521_170741_alter_message extends CDbMigration
{
	public function up()
	{
		$this->addForeignKey('FK_message_touristId',
			'message', array('touristId'), 'tourists', array('id'),
			'CASCADE',
			'CASCADE');
	}

	public function down()
	{
		$this->dropForeignKey('FK_message_touristId', 'message');
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