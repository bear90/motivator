<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\turoperatoram;

use application\models\forms\UserLogin;


class IndexAction extends \CAction
{
    public function run()
    {
        $this->controller->render('index', [
            
        ]);
    }
}