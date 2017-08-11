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
}
