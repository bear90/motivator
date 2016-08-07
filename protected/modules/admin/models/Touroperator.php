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

namespace application\modules\admin\models;

use application\models\Touroperator as TouroperatorEntity;

class Touroperator
{
    /**
     * Entity
     * @var TouroperatorEntity $data
     */
    protected $data = null;

    public function __construct(TouroperatorEntity $data = null)
    {
        $this->setData($data);
    }

    /**
     * Sets new data to be used
     *
     * @param TouroperatorEntity $data
     *
     * @return $this
     */
    public function setData(TouroperatorEntity $data = null)
    {
        if (null === $data) {
            $data = new TouroperatorEntity();
        }
        $this->data = $data;

        return $this;
    }

    /**
     * Returns entity to be used
     *
     * @return TouroperatorEntity
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Deletes entity
     *
     * @throws  \CDbException
     */
    public function delete()
    {
        $this->data->delete();
    }

    /**
     * Save  data
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
}