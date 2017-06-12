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

class Task
{

    private $data = null;

    public function __construct(entities\Task $entity = null)
    {
        if (is_null($entity)) {
            $entity = new entities\Task();
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

    public function attachCountries(array $items)
    {
        if (count($items)) {
            foreach ($items as $value) {
                $entity = new entities\TaskCountry();
                $entity->taskId = $this->data->id;
                $entity->countryId = $value;
                $entity->save();

                if ($entity->hasErrors()) {
                    throw new \Exception (Tools::errorsToString($entity->getErrors()));
                }
            }
        }

        return true;
    }

    public function attachCildAgies(array $items)
    {
        if (count($items)) {
            foreach ($items as $value) {
                $entity = new entities\TaskChildAge();
                $entity->taskId = $this->data->id;
                $entity->age = $value;
                $entity->save();

                if ($entity->hasErrors()) {
                    throw new \Exception (Tools::errorsToString($entity->getErrors()));
                }
            }
        }

        return true;
    }
}
