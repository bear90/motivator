<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\controllers;


class UserController extends \CController
{
    public function actions(){
        return [
            'login' => 'application\\controllers\\user\\LoginAction',
        ];
    }
}