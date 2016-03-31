<?php

namespace application\models;

use application\components\DBEntity;

class Touragent extends DBEntity {

    public function rules(){
        return [
            ['name', 'required'],
            ['site', 'safe']
        ];
    }

    public function relations()
    {
        return [
            'user'=>[self::BELONGS_TO, 'application\\models\\User', 'userId'],
            'managers'=>[self::HAS_MANY, 'application\\models\\TouragentManager', 'touragentId'],
        ];
    }
 
    public function tableName()
    {
        return 'touragents';
    }

    public static function getOptions()
    {
        static $list;

        if (!isset($list))
        {
            $list = self::model()->findAll();
            $list = \CHtml::listData($list, 'id', 'name');
            $list = \CMap::mergeArray(['' => 'Выберите турагента'], $list);
        }

        return $list;
    }

    public static function getSiteOptions()
    {
        static $list;

        if (!isset($list))
        {
            $list = self::model()->findAll();
            $list = \CHtml::listData($list, 'site', 'name');
            $list = \CMap::mergeArray(['' => 'Выберите турагента'], $list);
        }

        return $list;
    }

    public function getManager($id)
    {
        foreach ($this->managers as $manager) {
            if ($manager->id == $id)
            {
                return $manager;
            }
        }

        return null;
    }

    public function getSiteName()
    {
        $name = $this->site;

        switch (true) {
            case strpos($this->site, 'https://') !== false:
                $name = substr($this->site, 8);
                break;

            case strpos($this->site, 'http://') !== false:
                $name = substr($this->site, 7);
                break;
        }
        $name = rtrim($name, '/');

        return $name;
    }

    public function getSiteLink()
    {
        $link = $this->site;

        if (strpos($link, 'https://') === false && strpos($link, 'http://') === false)
        {
            $link = 'http://' . $link;
        }

        $link = rtrim($link, '/') . '/';

        return $link;
    }
}