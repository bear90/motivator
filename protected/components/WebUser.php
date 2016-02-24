<?php

/**
 * Description of WebUser
 *
 * @property User $model.
 *
 * @author viktarmishyn
 */
class WebUser extends CWebUser {

    const ACCESS_TENANT = 'tenant';
    const ACCESS_ADMIN = 'admin';
    const ACCESS_USER = 'user';

    const OPERATION_ALARM_LOG = 'alarm-log';

    protected $model;
    protected $permissions = [
        self::OPERATION_ALARM_LOG => 'admin'
    ];

    public function init() {
        parent::init();

        if ($this->id !== null) {
            $this->loadUser($this->id);
        }
    }

    protected function loadUser($id = '') {
        if ($this->model == null) {
            if ($id !== null) {
                $idParts = explode('#', $id);
                $this->model = User::model()->findByPk(end($idParts));
            }
        }

        $this->loadPermissions();

        return $this->model;
    }

    protected function loadPermissions()
    {
        if ($this->model)
        {
            $aBackEnd = $this->model->tenant->getSettings('backend');
            $aPermissions = !empty($aBackEnd['modulePermissions']) ? $aBackEnd['modulePermissions'] : [];
            $this->permissions = array_replace_recursive($this->permissions, $aPermissions);
        }
    }

    public function isAllow($name)
    {
        if ( $this->model && isset($this->permissions[$name]) )
        {
            switch (true)
            {
                case $this->permissions[$name] === self::ACCESS_TENANT:
                    return $this->model->isTenant();
                    break;

                case $this->permissions[$name] === self::ACCESS_ADMIN:
                    return $this->model->isAdmin();
                    break;

                case $this->permissions[$name] === self::ACCESS_USER:
                    return $this->model->isUser();
                    break;
            }
        }

        return false;
    }

    protected function beforeLogin($id, $states, $fromCookie) {
        $this->loadUser($id);

        return true;
    }

    protected function afterLogin($fromCookie)
    {
        Yii::app()->request->cookies['language'] = new CHttpCookie('language', strtolower($this->model->lang));
    }

    protected function afterLogout()
    {
        unset(Yii::app()->request->cookies['language']);
    }

    public function getModel() {
        return $this->model;
    }
}

?>
