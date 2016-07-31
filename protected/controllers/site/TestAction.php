<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\site;

use application\models\Tourist;

class TestAction extends \CAction
{
    public function run()
    {
        $tourist = Tourist::model()->findByAttributes(['email' => 'soza.mihail@gmail.com']);

        if ($tourist)
        {
            $sent = \Tool::sendEmailWithLayout($tourist, 'after_prepayment');

            var_dump($sent);
        }
    }
}