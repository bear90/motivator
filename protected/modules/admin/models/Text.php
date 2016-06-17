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

use application\modules\admin\models\Entity\TextEntity;

class Text
{
    /**
     * Offline Document Subtype entity
     * @var TextEntity $data
     */
    protected $data = null;

    public function __construct(TextEntity $data = null)
    {
        $this->setData($data);
    }

    /**
     * Sets new Document Subtype data to be used
     *
     * @param TextEntity $data
     *
     * @return $this
     */
    public function setData(TextEntity $data = null)
    {
        if (null === $data) {
            $data = new TextEntity();
        }
        $this->data = $data;

        return $this;
    }

    /**
     * Returns Document Subtype entity to be used
     *
     * @return TextEntity
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Deletes Document Subtype
     *
     * @throws  \CDbException
     */
    public function delete()
    {
        $this->data->delete();
    }

    /**
     * Save Document Subtype data
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