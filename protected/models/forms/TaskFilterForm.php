<?php

/**
 * @author soza.mihail@gmail.com
 */
namespace application\models\forms;

class TaskFilterForm extends \CFormModel
{
    public $country;
    public $startedAtAny;
    public $startedAtFrom;
    public $startedAtTo;
    public $adultCount;

    public function rules(){
        return [
        ];
    }

    public function filtered()
    {
        return !empty($this->country) || !empty($this->startedAtAny) || 
               !empty($this->startedAtFrom) || !empty($this->adultCount);
    }
}
