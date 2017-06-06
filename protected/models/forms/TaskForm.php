<?php

/**
 * @author soza.mihail@gmail.com
 */
namespace application\models\forms;

class TaskForm extends \CFormModel
{
    public $name;
    public $country;
    public $tourType;
    public $adultCount;
    public $childCount;
    public $days;
    public $startedAt;
    public $email;
    public $verifyCode;

    public function rules(){
        return [
            ['verifyCode', 'captcha'],
        ];
    }
}
