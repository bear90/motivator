<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       17.06.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\models\Entity;

use application\models\entities;

class Template
{
    /**
     * Offline Template entity
     * @var entities\Template $data
     */
    protected $data = null;

    public function __construct(entities\Template $data = null)
    {
        $this->setData($data);
    }

    /**
     * Sets new Template data to be used
     *
     * @param entities\Template $data
     *
     * @return $this
     */
    public function setData(entities\Template $data = null)
    {
        if (null === $data) {
            $data = new entities\Template();
        }
        $this->data = $data;

        return $this;
    }

    /**
     * Returns Template entity to be used
     *
     * @return TextEntity
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Deletes Template
     *
     * @throws  \CDbException
     */
    public function delete()
    {
        $this->data->delete();
    }

    /**
     * Save Template data
     *
     * @param array $attributes
     * @return bool
     * @throws \Exception
     */
    public function save(array $attributes = [])
    {
        if ($attributes)
        {
            $this->data->attributes = $attributes;
        }
        if($this->data->id)
        {
            $this->data->updatedAt = new \CDbExpression('NOW()');
        }

        $this->data->save();
        if ( $this->data->hasErrors() ) {
            throw new \Exception ( \Tool::errorToString( $this->data->getErrors() )  );
        }
        return true;
    }

    public static function get($key)
    {
        $entity = entities\Template::model()->find("`key` = :key", ['key' => $key]);

        return $entity;
    }
}