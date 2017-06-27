<?php

class m170626_040008_alter_offer_table extends CDbMigration
{
	public function safeUp()
	{
		$this->addColumn('tbl_offer', 'earlyPrice', 'DECIMAL(15,2) NULL DEFAULT NULL');
		$this->addColumn('tbl_offer', 'lastMinPrice', 'DECIMAL(15,2) NULL DEFAULT NULL');
		$this->dropColumn('tbl_offer', 'priceType');
	}

	public function safeDown()
	{
		$this->dropColumn('tbl_offer', 'earlyPrice');
		$this->dropColumn('tbl_offer', 'lastMinPrice');
		$this->addColumn('tbl_offer', 'priceType', 'int');
	}
}