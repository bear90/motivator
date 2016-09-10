<?php

class m160910_223958_alter_tourist_tour extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tourist_tour', 'currency', 'DECIMAL(15,2) NOT NULL DEFAULT 0');
		$this->addColumn('tourist_tour', 'currencyUnit', 'ENUM("usd", "eur", "byn") NOT NULL');
	}

	public function down()
	{
		$this->dropColumn('tourist_tour', 'currency');
		$this->dropColumn('tourist_tour', 'currencyUnit');
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