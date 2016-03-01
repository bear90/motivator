<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\turagentam;


class IndexAction extends \CAction
{
    public function run()
    {
        $this->controller->render('index', [
            
        ]);
    }
}