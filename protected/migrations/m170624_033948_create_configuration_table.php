<?php

class m170624_033948_create_configuration_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_configuration',array(
            'id' => 'pk',
            'name' => 'varchar(100) NOT NULL',
            'type' => 'ENUM("string", "integer", "array", "float") NOT NULL',
            'value' => 'TEXT NULL'
        ));
	}

	public function safeDown()
	{
		$this->dropTable('tbl_configuration');
	}
}