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
}
