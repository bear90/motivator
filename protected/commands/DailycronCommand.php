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
        $waitDiscontReminder1 = 0;
        $waitDiscontReminder2 = 0;
        $waitDiscontReminder3 = 0;

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

        // First notification (1/3 part)
        $criteria = new CDbCriteria();
        $criteria->addCondition('statusId = :status');
        $criteria->addCondition('ADDDATE(counterStartedAt, CEIL(TIMESTAMPDIFF(DAY, counterStartedAt, counterDate)/3)) = :date');
        $criteria->params = [
            'status' => TouristStatus::WANT_DISCONT,
            'date' => $dateTime->format('Y-m-d'),
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            Tool::informTourist($tourist, 'wait_discont_1');
            $waitDiscontReminder1++;
        }

        // Second notification (2/3 part)
        $criteria = new CDbCriteria();
        $criteria->addCondition('statusId = :status');
        $criteria->addCondition('ADDDATE(counterStartedAt, CEIL(TIMESTAMPDIFF(DAY, counterStartedAt, counterDate)*2/3)) = :date');
        $criteria->params = [
            'status' => TouristStatus::WANT_DISCONT,
            'date' => $dateTime->format('Y-m-d'),
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            Tool::informTourist($tourist, 'wait_discont_2');
            $waitDiscontReminder2++;
        }

        // Third notification (-2 days part)
        $criteria = new CDbCriteria();
        $criteria->addCondition('statusId = :status');
        $criteria->addCondition('ADDDATE(counterDate, -2) = :date');
        $criteria->params = [
            'status' => TouristStatus::WANT_DISCONT,
            'date' => $dateTime->format('Y-m-d'),
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            Tool::informTourist($tourist, 'wait_discont_3');
            $waitDiscontReminder3++;
        }

        print("Count of yesterday registered tourists: {$yesterdayRegistered}\n");
        print("Count of 1st notification for wait dicont tourist: {$waitDiscontReminder1}\n");
        print("Count of 2nd notification for wait dicont tourist: {$waitDiscontReminder2}\n");
        print("Count of 3rd notification for wait dicont tourist: {$waitDiscontReminder3}\n");
    }
}