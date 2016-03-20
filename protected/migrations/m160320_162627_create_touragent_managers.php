<?php

class m160320_162627_create_touragent_managers extends CDbMigration
{
	public function up()
	{
		$this->createTable('touragent_managers',array(
            'id' => 'pk',
            'name' => 'varchar(255) NOT NULL',
            'touragentId' => 'INT NOT NULL'
        ));
        $this->addForeignKey('FK_touragent_managers_touragentId', 'touragent_managers', array('touragentId'), 'touragents', array('id'), 
			'CASCADE', 
			'CASCADE');
	}

	public function down()
	{
		$this->dropTable('touragent_managers');
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