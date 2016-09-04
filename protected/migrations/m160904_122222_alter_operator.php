<?php

class m160904_122222_alter_operator extends CDbMigration
{
	public function up()
	{
		$this->addColumn('touroperator', 'contractNumber', 'VARCHAR(10)');
		$this->addColumn('touroperator', 'percent', 'DECIMAL(15,2)');
	}

	public function down()
	{
		$this->dropColumn('touroperator', 'contractNumber');
		$this->dropColumn('touroperator', 'percent');
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