<?php

/**
 * @author soza.mihail@gmail.com
 */
namespace application\models\forms;

class TaskForm extends \CFormModel
{
    public $name1;
    public $name2;
    public $country;
    public $tourType;
    public $adultCount;
    public $childCount;
    public $childAge;
    public $days;
    public $startedAt;
    public $email;
    public $verifyCode;
    public $checkbox;

    public function rules(){
        return [
            ['verifyCode', 'captcha'],
        ];
    }
}
