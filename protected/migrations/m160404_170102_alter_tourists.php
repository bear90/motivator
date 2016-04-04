<?php

class m160404_170102_alter_tourists extends CDbMigration
{
	/*public function up()
	{
	}

	public function down()
	{
		echo "m160404_170102_alter_tourists does not support migration down.\n";
		return false;
	}*/


	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->addColumn('tourists', 'counterReason', 'INT DEFAULT 0');
		$this->addColumn('tourists', 'counterDate', 'TIMESTAMP');
	}

	public function safeDown()
	{
		$this->dropColumn('tourists', 'counterReason');
		$this->dropColumn('tourists', 'counterDate');
	}

}