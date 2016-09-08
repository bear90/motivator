<?php

class m160303_214149_create_configuration_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('configuration',array(
            'id' => 'pk',
            'name' => 'varchar(100) NOT NULL',
            'type' => 'ENUM("string", "integer", "array", "float") NOT NULL',
            'value' => 'TEXT NULL'
        ));
	}

	public function down()
	{
		$this->dropTable('configuration');
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