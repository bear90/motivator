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

class User
{

    private $data = null;

    public function __construct(entities\User $entity = null)
    {
        if (is_null($entity)) {
            $entity = new entities\User();
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

    public function getAutoLoginLink()
    {
        $hash = md5($this->data->id . $this->data->salt());
        return Configuration::get(Configuration::SITE_DOMAIN) . "/user/login?hash={$hash}";
    }

    public function markLoginTime()
    {
        if (empty($this->data->firstLogin))
        {
            $this->data->firstLogin = new \CDbExpression('now()');
            if ($this->data->roleId == defines\UserRole::USER)
            {
                \Yii::app()->user->setFlash('firstLogin', true);
            }
        }
        $this->data->lastLogin = new \CDbExpression('now()');
        $this->save();
    }
    
}
