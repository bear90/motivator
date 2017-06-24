<?php

class m170623_185955_create_tbl_user extends CDbMigration
{
	public function safeUp()
	{
		// Create user_roles
        $this->createTable('tbl_user_roles', array(
            'id' => 'pk',
            'name' => 'varchar(100) NOT NULL'
        ));

        $this->insertMultiple('tbl_user_roles', array(
            array('id' => 1, 'name' => 'user'),
            array('id' => 2, 'name' => 'manager'),
            array('id' => 3, 'name' => 'admin'),
        ));

        // Create table users
        $this->createTable('tbl_user', array(
            'id' => 'pk',
            'password' => 'varchar(45) NOT NULL',
            'code' => 'varchar(45) NULL DEFAULT NULL',
            'roleId' => 'int(11) NOT NULL',
            'firstLogin' => 'TIMESTAMP NULL',
            'lastLogin' => 'TIMESTAMP NULL'
        ));

        $this->addForeignKey('FK_tbl_user_roleId', 'tbl_user', array('roleId'), 'tbl_user_roles', array('id'));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_user_roles');
        $this->dropTable('tbl_user');
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