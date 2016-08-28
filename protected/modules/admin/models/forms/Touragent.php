<?php
namespace application\modules\admin\models\forms;

use application\models\defines\UserRole;

class Touragent extends \CFormModel
{

    public $name;
    public $site;
    public $address;
    public $logo;
    public $password;
    public $repeate;

    public $userId;

    public function rules(){
        return array(
            array('name, site', 'required'),
            array('password', 'required', 'on' => 'create'),
            array('address, repeate', 'safe'),
            array('logo', 'file', 
                'types' => ['jpg', 'gif', 'png'], 
                'allowEmpty' => true,
                'maxSize' => 1 * 1024 * 1024,    // 1 MB
                'tooLarge' => 'Размер файла "{file}" слишком велик, он не должен превышать 1 Мегабайт.'
            ),
            ['password', 'compare', 
                'allowEmpty' => true,
                'operator' => '==',
                'compareAttribute' => 'repeate'
            ],
            ['password', 'length', 
                'min' => 6
            ],
            ['password', 'unique',
                'attributeName' => 'password',
                'className' => '\\application\\models\\User',
                'criteria' => [
                    'condition' => 't.roleId = :managerRole',
                    'params' => [
                        'managerRole' => UserRole::MANAGER, 
                    //    'userId' => $this->userId
                    ]
                ]
            ]

        );
    }

    public function attributeLabels(){
        return [
            'name' => 'Наименование',
            'site' => 'Сайт',
            'address' => 'Адрес',
            'logo' => 'Логотип',
            'password' => 'Пароль',
        ];
    }
}