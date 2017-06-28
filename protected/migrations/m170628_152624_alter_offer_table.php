<?php

class m170628_152624_alter_offer_table extends CDbMigration
{
	public function safeUp()
	{
		$this->alterColumn('tbl_offer', 'price', 'DECIMAL(15,2) NULL DEFAULT NULL');
	}

	public function safeDown()
	{
		$this->alterColumn('tbl_offer', 'price', 'DECIMAL(15,2) NOT NULL');
	}
}