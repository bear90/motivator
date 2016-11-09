<?php

class m161107_211022_create_banners extends CDbMigration
{
	public function up()
	{
		$this->createTable('banner_site',array(
            'id' => 'pk',
            'name' => 'VARCHAR(255) NOT NULL',
            'width' => 'INT NOT NULL',
            'height' => 'INT NOT NULL',
        ));

		$this->createTable('banner',array(
            'id' => 'pk',
            'siteId' => 'INT NOT NULL'
        ));
	}

	public function down()
	{
		$this->dropTable('banner_site');
		$this->dropTable('banner');
	}
}