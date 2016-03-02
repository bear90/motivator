<?php

class m160302_160054_structure_indexes extends CDbMigration
{
	public function up()
	{
        $this->addForeignKey('FK_tourist_statusId', 'tourists', ['statusId'], 'tourist_statuses', ['id'], 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('FK_tourists_userId', 'tourists', ['userId'], 'users', ['id']);
        $this->addForeignKey('FK_users_roleId', 'users', ['roleId'], 'user_roles', ['id']);
	}

	public function down()
	{
		$this->dropForeignKey('FK_tourist_statusId', 'tourists');
		$this->dropForeignKey('FK_tourists_userId', 'tourists');
		$this->dropForeignKey('FK_users_roleId', 'users');
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