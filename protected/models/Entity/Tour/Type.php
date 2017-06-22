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
namespace application\models\Entity\Tour;
use application\models\entities;

class Type
{
    /** @var entities\TourType */
    protected $data = null;

    public function __construct(entities\TourType $data = null)
    {
        $this->setData($data);
    }

    /**
     * Sets new Tour Type data to be used
     *
     * @param entities\TourType $data
     *
     * @return $this
     */
    public function setData(entities\TourType $data = null)
    {
        if (null === $data) {
            $data = new entities\TourType();
        }
        $this->data = $data;

        return $this;
    }

    /**
     * Returns TourType entity to be used
     *
     * @return entities\TourType
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * Deletes Tour Type
     *
     * @throws  \CDbException
     */
    public function delete()
    {
        $this->data->delete();
    }

    /**
     * Save Tour Type data
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

        $this->data->save();

        if ( $this->data->hasErrors() ) {
            throw new \Exception ( \Tool::errorToString( $this->data->getErrors() )  );
        }
        return true;
    }

    public static function getOptions()
    {
        $list = entities\TourType::model()->options()->findAll();
        $list = \CHtml::listData($list, 'id', 'name');

        return $list;
    }
}
