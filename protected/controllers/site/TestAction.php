<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\site;

class TestAction extends \CAction
{
    public function run()
    {
        $tourist = 'soza.mihail@gmail.com';

        if ($tourist)
        {
            $sent = \Tool::sendEmailWithView($tourist, 'add-task');

            var_dump($sent);
        }
    }
}