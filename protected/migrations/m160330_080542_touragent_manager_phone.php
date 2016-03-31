<?php

class m160330_080542_touragent_manager_phone extends CDbMigration
{
	public function up()
	{
		$this->createTable('touragent_manager_phone', array(
            'id' => 'pk',
            'managerId' => 'INT NOT NULL',
            'phone' => 'varchar(100) NOT NULL'
        ));
        $this->addForeignKey('FK_touragent_manager_phone_managerId', 'touragent_manager_phone', array('managerId'), 'touragent_managers', array('id'), 
			'CASCADE', 
			'CASCADE');
	}

	public function down()
	{
		$this->dropTable('tourist_statuses');
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