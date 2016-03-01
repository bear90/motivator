<?php

use application\models\User;
use application\models\defines\UserRole;

/**
 * Description of WebUser
 *
 * @property User $model.
 *
 * @author viktarmishyn
 */
class WebUser extends CWebUser {

    protected $model;

    public function init() {
        parent::init();

        if ($this->id !== null) {
            $this->loadUser($this->id);
        }
    }

    protected function loadUser($id = '') {
        if ($this->model == null && $id !== null) {
            $idParts = explode('#', $id);
            $this->model = User::model()->findByPk(end($idParts));
        }

        return $this->model;
    }

    protected function beforeLogin($id, $states, $fromCookie) {
        $this->loadUser($id);

        return true;
    }

    public function getModel() {
        return $this->model;
    }

    public function isUser()
    {
        return $this->model && $this->model->roleId == UserRole::USER ? true : false;
    }
}

?>
