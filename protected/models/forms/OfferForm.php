<?php

/**
 * @author soza.mihail@gmail.com
 */
namespace application\models\forms;

class OfferForm extends \CFormModel
{
    public $contact;
    public $description;
    public $priceType;
    public $price;
    public $taskId;

    public function rules(){
        return [];
    }
}
