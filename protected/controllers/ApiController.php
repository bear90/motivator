<?php

namespace application\controllers;

class ApiController extends \CController {

    public function actions(){
        return [
            'touristCreate' => 'application\\controllers\\api\\TouristCreateAction',
        ];
    }
}