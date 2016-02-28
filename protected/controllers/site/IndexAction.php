<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\site;

use application\models\forms\UserLogin;


class IndexAction extends \CAction
{
    public function run()
    {
        $this->controller->render('index', [
            'loginForm' => new \CForm('application.views.forms.login', new UserLogin()),
        ]);
    }
}