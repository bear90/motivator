<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\kontakty;


class IndexAction extends \CAction
{
    public function run()
    {
        $this->controller->render('index', [
            
        ]);
    }
}