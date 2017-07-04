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

class Repository
{

    public static function findByHash($hash)
    {
        $entity = entities\User::model();
        $criteria = new \CDbCriteria();
        $criteria->addCondition('md5(concat(id, :salt)) = :hash');
        $criteria->params = [
            'salt' => $entity->salt(),
            'hash' => $hash
        ];

        return $entity->find($criteria);
    }
}
