<?php

class m170819_062355_alter_table_offer extends CDbMigration
{
	public function safeUp()
	{
		$this->addForeignKey('FK_tbl_offer_touragentId', 'tbl_offer', ['touragentId'], 'tbl_touragent', ['id'], 
			'CASCADE', 
			'CASCADE');
	}

	public function safeDown()
	{
		$this->dropForeignKey('FK_tbl_offer_touragentId', 'tbl_offer');
	}
}