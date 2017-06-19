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

namespace application\models\Entity\User;
use application\models\entities;


class Name
{

    protected $data = null;

    public function __construct(entities\UserName $data = null)
    {
        $this->setData($data);
    }

    /**
     * Sets new User name data to be used
     *
     * @param entities\UserName $data
     *
     * @return $this
     */
    public function setData(entities\UserName $data = null)
    {
        if (null === $data) {
            $data = new entities\UserName();
        }
        $this->data = $data;

        return $this;
    }

    /**
     * Returns User name entity to be used
     *
     * @return TextEntity
     */
    public function data()
    {
        return $this->data;
    }

    /**
     * Deletes User name
     *
     * @throws  \CDbException
     */
    public function delete()
    {
        $this->data->delete();
    }

    /**
     * Save User name data
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

    public static function getOptions1()
    {
        $list = entities\UserName::model()->options()->findAllByAttributes(['type' => 1]);
        $list = \CHtml::listData($list, 'id', 'name');

        return $list;
    }

    public static function getOptions2()
    {
        $list = entities\UserName::model()->options()->findAllByAttributes(['type' => 2]);
        $list = \CHtml::listData($list, 'id', 'name');

        return $list;
    }
}
