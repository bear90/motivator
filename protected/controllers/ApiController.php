<?php

namespace application\controllers;

class ApiController extends \CController {

    public function actions(){
        return [
            'touristCreate' => 'application\\controllers\\api\\TouristCreateAction',
            'calculate-choice-tour' => 'application\\controllers\\api\\CalculateChoiceTourAction',
            'calculate-change-tour' => 'application\\controllers\\api\\CalculateChangeTourAction',
            'search-tourist' => 'application\\controllers\\api\\SearchTouristAction',
            'ask-question' => 'application\\controllers\\api\\AskQuestionAction',
            'close-message' => 'application\\controllers\\api\\CloseMessageAction',
        ];
    }
}