<?php

class m160912_052219_alter_touragents extends CDbMigration
{
	public function up()
	{
		$this->addColumn('touragents', 'currencyFactorEur', 'DECIMAL(15,2) NOT NULL DEFAULT 1');
		$this->addColumn('touragents', 'currencyFactorUsd', 'DECIMAL(15,2) NOT NULL DEFAULT 1');
	}

	public function down()
	{
		$this->dropColumn('touragents', 'currencyFactorEur');
		$this->dropColumn('touragents', 'currencyFactorUsd');
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