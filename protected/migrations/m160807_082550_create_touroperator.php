<?php

class m160807_082550_create_touroperator extends CDbMigration
{
	public function up()
	{
		$this->createTable('touroperator',array(
            'id' => 'pk',
            'name' => 'varchar(255) NOT NULL'
        ));
	}

	public function down()
	{
		$this->dropTable('touroperator');
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