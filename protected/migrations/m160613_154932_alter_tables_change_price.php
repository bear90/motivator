<?php

class m160613_154932_alter_tables_change_price extends CDbMigration
{
	public function up()
	{
		$this->alterColumn('discount_transaction', 'amount', 'DECIMAL(15,2) NOT NULL');
		$this->alterColumn('tour_offer', 'price', 'DECIMAL(15,2) NOT NULL');
		$this->alterColumn('tourist_tour', 'price', 'DECIMAL(15,2) NOT NULL');
		$this->alterColumn('tourist_tour', 'prepayment', 'DECIMAL(15,2) NOT NULL');
	}

	public function down()
	{
		$this->alterColumn('discount_transaction', 'amount', 'INT NOT NULL');
		$this->alterColumn('tour_offer', 'price', 'INT NOT NULL');
		$this->alterColumn('tourist_tour', 'price', 'INT NOT NULL');
		$this->alterColumn('tourist_tour', 'prepayment', 'INT NOT NULL');
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