<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       11.07.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */

namespace application\modules\admin\models\forms;

use application\models\defines\UserRole;


class Password extends \CFormModel
{
    public $password;
    public $password2;

    public function rules(){
        return [
            ['password', 'required'], 
            ['password', 'compare', 
                'allowEmpty' => true,
                'operator' => '==',
                'compareAttribute' => 'password2'
            ],
            ['password', 'length', 
                'min' => 12
            ],
            ['password', 'unique',
                'attributeName' => 'password',
                'className' => '\\application\\models\\User',
                'criteria' => [
                    'condition' => 't.roleId = :managerRole',
                    'params' => [
                        'managerRole' => UserRole::ADMIN, 
                    //    'userId' => $this->userId
                    ]
                ]
            ]
        ];
    }

    public function attributeLabels(){
        return [
            'password' => 'Новый пароль',
        ];
    }
}