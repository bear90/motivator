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

class Repository
{

    public static function findByHash($hash)
    {
        $criteria = new \CDbCriteria();
        $criteria->addCondition('md5(concat(id, :salt)) = :hash');
        $criteria->params = [
            'salt' => $this->data->salt(),
            'hash' => $hash
        ];

        return $this->find($criteria);
    }
}
