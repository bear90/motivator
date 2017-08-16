<?php

class m170816_033731_create_table_touragent_offer extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable('tbl_touragent_offer', [
			'id' => 'pk',
            'touragentId' => 'INT NOT NULL',
            'offerId' => 'INT NULL',
            'createdAt' => 'TIMESTAMP',
		], 'ENGINE = InnoDB DEFAULT CHARACTER SET = utf8 COLLATE = utf8_general_ci');
        
        //$this->createIndex('FK_tbl_touragent_userId_idx', 'tbl_touragent', 'userId');
		
		$this->addForeignKey('FK_tbl_touragent_offer_touragentId', 'tbl_touragent_offer', ['touragentId'], 'tbl_touragent', ['id'], 
			'CASCADE', 
			'CASCADE');

		$this->addForeignKey('FK_tbl_touragent_offer_offerId', 'tbl_touragent_offer', ['offerId'], 'tbl_offer', ['id'], 
			'SET NULL', 
			'CASCADE');
	}

	public function safeDown()
	{
		$this->dropTable('tbl_touragent_offer');
	}

}