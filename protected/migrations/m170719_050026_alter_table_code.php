<?php

class m170719_050026_alter_table_code extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->addColumn('tbl_code', 'expiredAt', 'TIMESTAMP');
		$this->addColumn('tbl_code', 'deleted', 'INT NOT NULL DEFAULT 0');
	}

	public function safeDown()
	{
		$this->dropColumn('tbl_code', 'expiredAt');
		$this->dropColumn('tbl_code', 'deleted');
	}
	
}