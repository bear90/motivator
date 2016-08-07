<?php

class m160807_211111_create_touragent_operator extends CDbMigration
{
	public function up()
	{
		$this->createTable('touragent_operator',array(
            'id' => 'pk',
            'touragentId' => 'INT NOT NULL',
            'touroperatorId' => 'INT NOT NULL',
        ));
        $this->addForeignKey('FK_touragent_operator_touragentId', 'touragent_operator', array('touragentId'), 'touragents', array('id'), 
			'CASCADE', 
			'CASCADE');
        $this->addForeignKey('FK_touragent_operator_touroperatorId', 'touragent_operator', array('touroperatorId'), 'touroperator', array('id'), 
			'CASCADE', 
			'CASCADE');
	}

	public function down()
	{
		$this->dropTable('touragent_operator');
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