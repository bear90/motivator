<?php

class m160910_213709_alter_touragents extends CDbMigration
{
	public function up()
	{
		$this->addColumn('touragents', 'currencyFactor', 'DECIMAL(15,2) NOT NULL DEFAULT 1');
		$this->addColumn('tour_offer', 'currency', 'DECIMAL(15,2) NOT NULL DEFAULT 0');
		$this->addColumn('tour_offer', 'currencyUnit', 'ENUM("usd", "eur", "byn") NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('touragents', 'currencyFactor');
		$this->dropColumn('tour_offer', 'currency');
		$this->dropColumn('tour_offer', 'currencyUnit');
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