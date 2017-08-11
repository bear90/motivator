<?php

class m170811_040709_create_table_touragent extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_touragent', [
			'id' => 'pk',
            'name' => 'VARCHAR(100) NOT NULL',
            'site' => 'VARCHAR(100) NOT NULL',
            'userId' => 'INT NOT NULL',
            'status' => 'INT NOT NULL DEFAULT 0',
		]);
        
        $this->createIndex('FK_tbl_touragent_userId_idx', 'tbl_touragent', 'userId');
		
		$this->addForeignKey('FK_tbl_touragent_userId', 'tbl_touragent', ['userId'], 'tbl_user', ['id'], 
			'CASCADE', 
			'CASCADE');
	}

	public function safeDown()
	{
		$this->dropTable('tbl_touragent');
	}
}