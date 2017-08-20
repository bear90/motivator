<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       06.06.2017
 * @package
 * @copyright   Copyright (c) 2015-2017 soXes GmBh.
 *
 */

namespace application\models\Entity;
use application\models\Tools;
use application\models\entities;
use application\models\defines;
use application\models\entities\Configuration;

class Touragent
{

    private $data = null;

    public function __construct(entities\Touragent $entity = null)
    {
        if (is_null($entity)) {
            $entity = new entities\Touragent();
        }
        $this->data = $entity;
    }

    public function data()
    {
        return $this->data;
    }

    public function save(array $attributes = [])
    {
        if ($attributes) {
            $this->data->attributes = $attributes;
        }
        $this->data->save();

        if ($this->data->hasErrors()) {
            throw new \Exception (Tools::errorsToString($this->data->getErrors()));
        }

        return true;
    }

    public function getContacts()
    {
        $link = $this->data->site;
        if (substr($link, 0, 4) != 'http') {
            $link = "http://{$link}";
        }
        $html = "<p>Турагентство: " . $this->data->name . "</p>";
        $html .= "<p>Сайт: <a href='{$link}'>" . $this->data->site . "</a></p>";
        $html .= "<p>Менеджер: </p>";

        return $html;
    }

    public function getLink()
    {
        $link = $this->data->site;
        if (substr($link, 0, 4) != 'http') {
            $link = "http://{$link}";
        }
        
        return $link;
    }
}
