<?php

class m170610_133158_create_task_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('tbl_task',array(
            'id' => 'pk',
            'name' => 'VARCHAR(70)',
            'email' => 'VARCHAR(70)',
            'tourType' => 'int',
            'adultCount' => 'int',
            'childCount' => 'int',
            'days' => 'int',
            'startedAt' => 'TIMESTAMP NULL',
            'createdAt' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ));

        $this->createTable('tbl_task_country',array(
            'id' => 'pk',
            'taskId' => 'int',
            'countryId' => 'int',
        ));
        $this->addForeignKey('FK_tbl_task_country_taskId', 'tbl_task_country', ['taskId'], 'tbl_task', ['id'], 
			'CASCADE', 
			'CASCADE');

        $this->createTable('tbl_task_child_age',array(
            'id' => 'pk',
            'taskId' => 'int',
            'age' => 'int',
        ));
        $this->addForeignKey('FK_tbl_task_child_age_taskId', 'tbl_task_child_age', ['taskId'], 'tbl_task', ['id'], 
			'CASCADE', 
			'CASCADE');
	}

	public function safeDown()
	{
		$this->dropTable('tbl_task_child_age');
		$this->dropTable('tbl_task_country');
		$this->dropTable('tbl_task');
	}
	
}