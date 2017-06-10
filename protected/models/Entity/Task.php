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
use application\models\entities;

class Task
{

    private $data = null;

    public public function __construct(entities/Task $entity = null)
    {
        if (is_null($entity)) {
            $entity = new entities/Task();
        }
        $this->data = $entity;
    }

    public public function data()
    {
        return $this->data;
    }
}
