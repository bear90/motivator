<?php

class m160504_152706_create_discount_transaction extends CDbMigration
{
	public function up()
	{
		$this->createTable('discount_transaction', [
			'id' => 'pk',
			'sourceTouristId' => 'INT',
			'sourceTouristName' => 'VARCHAR(250)',
			'sourceTouragentId' => 'INT',
			'targetTouristId' => 'INT',
			'targetTouristName' => 'VARCHAR(250)',
			'targetTouragentId' => 'INT',
			'amount' => 'INT NOT NULL',
			'createAt' => 'TIMESTAMP',
			'comment' => 'TEXT',
		]);
		$this->addForeignKey('FK_discount_transaction_sourceTouristId',
			'discount_transaction', array('sourceTouristId'), 'tourists', array('id'),
			'SET NULL',
			'SET NULL');
		$this->addForeignKey('FK_discount_transaction_targetTouristId',
			'discount_transaction', array('targetTouristId'), 'tourists', array('id'),
			'SET NULL',
			'SET NULL');
		$this->addForeignKey('FK_discount_transaction_targetTouragentId',
			'discount_transaction', array('targetTouragentId'), 'touragents', array('id'),
			'SET NULL',
			'SET NULL');
	}

	public function down()
	{
		$this->dropTable('discount_transaction');
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