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

use application\modules\admin\models\Entity\TemplateEntity;

class Template
{
    /**
     * Offline Document Subtype entity
     * @var TemplateEntity $data
     */
    protected $data = null;

    public function __construct(TemplateEntity $data = null)
    {
        $this->setData($data);
    }

    /**
     * Sets new Document Subtype data to be used
     *
     * @param TemplateEntity $data
     *
     * @return $this
     */
    public function setData(TemplateEntity $data = null)
    {
        if (null === $data) {
            $data = new TemplateEntity();
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
        $templateEntity = TemplateEntity::model()->find("`key` = :key", ['key' => $key]);

        return $templateEntity ? $templateEntity->content : '';
    }
}