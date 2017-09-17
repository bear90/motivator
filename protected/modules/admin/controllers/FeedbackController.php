<?php

namespace application\modules\admin\controllers;

class FeedbackController extends AdminController {

    public $jsModule = 'feedback';

    public function actions(){
        return [
            'index' => 'application\\modules\\admin\\controllers\\feedback\\IndexAction',
            'delete' => 'application\\modules\\admin\\controllers\\feedback\\DeleteAction',
        ];
    }
}