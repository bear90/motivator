<?php

/**
 * @author soza.mihail@gmail.com
 */
namespace application\models\forms;

class OrderTour extends \CFormModel
{
    public $site;
    public $touragent;
    public $city;
    public $wishes;
    public $startDate;
    public $endDate;
    // step 2
    public $middleName;
    public $phone;
}