<?php

class m170917_054008_create_table_feedback extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_feedback', [
			'id' => 'pk',
            'userId' => 'INT',
            'text' => 'TEXT',
            'createdAt' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
		], 'ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci');

		$this->addForeignKey('FK_tbl_feedback_userId', 'tbl_feedback', ['userId'], 'tbl_user', ['id'], 
			'SET NULL', 
			'SET NULL');
	}

	public function safeDown()
	{
		$this->dropTable('tbl_feedback');
	}
}