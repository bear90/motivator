<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers\kontakty;


class QuestionAction extends \CAction
{
    public function run()
    {
        $email = \Yii::app()->request->getParam('email');

        $this->controller->render('question', [
            'email' => $email
        ]);
    }
}