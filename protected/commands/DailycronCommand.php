<?php
/**
* This command class implement daily jobs
*/
use application\models\defines\TouristStatus;
use application\models\Tourist;


class DailycronCommand extends CConsoleCommand
{
    
    public function run($args)
    {

        $date = isset($args[0]) ? date('Y-m-d', strtotime($args[0])) : null;
        $dateTime = new DateTime($date);
        // General counters
        $yesterdayRegistered = 0;

        // Get yesterday registered users
        $criteria = new CDbCriteria();
        $criteria->addCondition('statusId = :status');
        $criteria->addCondition('DATE(createdAt) = :date');
        $criteria->params = [
            'status' => TouristStatus::WANT_DISCONT,
            'date' => $dateTime->modify('-1 day')->format('Y-m-d'),
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            Tool::informTourist($tourist, 'after_registration');
            $yesterdayRegistered++;
        }

        print("Count of yesterday registered tourists: {$yesterdayRegistered}\n");
    }
}