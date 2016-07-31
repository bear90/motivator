<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\site;


class TestAction extends \CAction
{
    public function run()
    {
        $sent = \Tool::sendEmailWithView('soza.mihail@gmail.com', 'notice_1');

        dd($sent);
    }
}