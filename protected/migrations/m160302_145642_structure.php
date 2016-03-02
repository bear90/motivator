<?php

class m160302_145642_structure extends CDbMigration
{
    public function up()
    {
        // Create tourist_statuses
        $this->createTable('tourist_statuses',[
            'id' => 'pk',
            'name' => 'varchar(45) NOT NULL',
            'description' => 'varchar(255) NOT NULL',
        ]);

        $this->insertMultiple('tourist_statuses', [
            ['id' => 1, 'name' => 'abonent', 'description' => 'абонент системы МОТИВАТОР'],
            ['id' => 2, 'name' => 'want_discont', 'description' => 'соискатель скидки'],
            ['id' => 3, 'name' => 'getting_discont', 'description' => 'получатель скидки'],
            ['id' => 4, 'name' => 'have_discont', 'description' => 'обладатель скидки'],
        ]);

        // Create tourists
        $this->createTable('tourists',[
            'id' => 'pk',
            'firstName' => 'varchar(100) NOT NULL',
            'lastName' => 'varchar(100) NOT NULL',
            'email' => 'varchar(100) NOT NULL',
            'middleName' =>  'varchar(100) DEFAULT NULL',
            'phone' =>  'varchar(45) DEFAULT NULL',
            'userId' =>  'int(11) NOT NULL',
            'statusId' =>  'int(11) NOT NULL',
            'tourCity' =>  'varchar(45) DEFAULT NULL',
            'groupCode' =>  'varchar(45) DEFAULT NULL',
        ]);

        // Create user_roles
        $this->createTable('user_roles', [
            'id' => 'pk',
            'name' => 'varchar(100) NOT NULL'
        ]);

        $this->insertMultiple('user_roles', [
            ['id' => 1, 'name' => 'user'],
            ['id' => 2, 'name' => 'manager'],
            ['id' => 3, 'name' => 'admin'],
        ]);

        // Create table users
        $this->createTable('users', [
            'id' => 'pk',
            'password' => 'varchar(45) NOT NULL',
            'roleId' => 'int(11) NOT NULL'
        ]);

        // Create indexes for tourists table
        //$this->addPrimaryKey()
    }

    public function down()
    {
        $this->dropTable('tourist_statuses');
        $this->dropTable('tourists');
        $this->dropTable('user_roles');
        $this->dropTable('users');
    }


    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {

    }

    public function safeDown()
    {

    }

}