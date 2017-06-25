<?php

class m170624_083928_create_offer_table extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_offer',array(
            'id' => 'pk',
            'taskId' => 'int',
            'contact' => 'TEXT NULL',
            'description' => 'TEXT NULL',
            'createdBy' => 'int',
            'priceType' => 'int',
            'price' => 'DECIMAL(15,2) NOT NULL'
        ));

        $this->addForeignKey('FK_tbl_offer_taskId', 'tbl_offer', ['taskId'], 'tbl_task', ['id'], 
            'CASCADE', 
            'CASCADE');

        $this->addForeignKey('FK_tbl_offer_createdBy', 'tbl_offer', ['createdBy'], 'tbl_user', ['id'], 
            'SET NULL', 
            'CASCADE');
	}

	public function safeDown()
	{
        $this->dropTable('tbl_offer');
	}

}