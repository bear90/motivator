<?php

class m160902_231924_alter_operator extends CDbMigration
{
	public function up()
	{
		$this->addColumn('touroperator', 'boss', 'VARCHAR(255) DEFAULT NULL');
		$this->addColumn('touroperator', 'document', 'VARCHAR(255) DEFAULT NULL');
		$this->addColumn('touroperator', 'requisite', 'TEXT');
		$this->addColumn('touroperator', 'contractNumber', 'VARCHAR(10)');
	}

	public function down()
	{
		$this->dropColumn('touroperator', 'boss');
		$this->dropColumn('touroperator', 'document');
		$this->dropColumn('touroperator', 'requisite');
		$this->dropColumn('touroperator', 'contractNumber');
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