<?php
/**
 * @author soza.mihail@gmail.com
 */

namespace application\models\forms;


class UserRegister extends \CFormModel
{
    public $last_name;
    public $first_name;
    public $email;
    public $verifyCode;
    public $groupCode;

    public function rules(){
        return [
            ['verifyCode', 'captcha'],
        ];
    }
}