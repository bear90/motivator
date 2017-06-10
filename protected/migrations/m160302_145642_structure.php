<?php

class m160302_145642_structure extends CDbMigration
{
    public function safeUp()
    {
        $this->createTable('tbl_user_name',array(
            'id' => 'pk',
            'type' => 'int',
            'name' => 'varchar(45) NOT NULL',
        ));

        $this->insertMultiple('tbl_user_name', array(
            ['name' => 'Михаил', 'type' => '1'],
            ['name' => 'Дмитрий', 'type' => '1'],
            ['name' => 'Захар', 'type' => '1'],
            ['name' => 'Иван', 'type' => '1'],
            ['name' => 'Юлия', 'type' => '2'],
            ['name' => 'Ольга', 'type' => '2'],
            ['name' => 'Елена', 'type' => '2'],
            ['name' => 'Зина', 'type' => '2'],
        ));

        $this->createTable('tbl_country',array(
            'id' => 'pk',
            'name' => 'varchar(45) NOT NULL',
        ));

        $this->insertMultiple('tbl_country', array(
            ['name' => 'Италия'],
            ['name' => 'Греция'],
            ['name' => 'Испания'],
            ['name' => 'Турция'],
        ));

        $this->createTable('tbl_tour_type',array(
            'id' => 'pk',
            'name' => 'varchar(45) NOT NULL',
        ));

        $this->insertMultiple('tbl_tour_type', array(
            ['name' => 'Отдых на море'],
            ['name' => 'Развлечения и отдых'],
            ['name' => 'Экскурсионные туры'],
            ['name' => 'Экскурсии + отдых'],
            ['name' => 'Лечение'],
            ['name' => 'Оздоровление'],
            ['name' => 'Спорт'],
            ['name' => 'Походы'],
            ['name' => 'Горнолыжные туры'],
        ));
    }

    public function safeDown()
    {
        $this->dropTable('tbl_user_name');
        $this->dropTable('tbl_country');
        $this->dropTable('tbl_tour_type');
    }

}
