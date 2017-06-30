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

        if (\Yii::app()->request->getParam('mail')) {
            $message = "Line 1\r\nLine 2\r\nLine 3";
            $message = wordwrap($message, 70, "\r\n");
            print "Mail: ";
            var_dump(mail($tourist, 'My Subject', $message));
        } else {
            $sent = \Tool::sendEmailWithView($tourist, 'add-task');

            var_dump($sent);
        }
    }
}