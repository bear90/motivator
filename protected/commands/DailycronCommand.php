<?php
/**
* This command class implement daily jobs
*/
use application\models\defines\TouristStatus;
use application\models\Tourist;
use application\models\Configuration;


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
        $gettingDiscontReminder1 = 0;
        $gettingDiscontReminder2 = 0;
        $gettingDiscontReminder3 = 0;
        $afterTour1 = 0;
        $afterTour2 = 0;

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
        $criteria->addCondition('DATE(ADDDATE(createdAt, INTERVAL :days DAY)) = :date');
        $criteria->params = [
            'status' => TouristStatus::WANT_DISCONT,
            'date' => $dateTime->format('Y-m-d'),
            'days' => ceil(Configuration::get(Configuration::ORDER_TOUR_TIMER) / 3)
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            Tool::informTourist($tourist, 'wait_discont_1');
            $waitDiscontReminder1++;
        }

        // Second notification (2/3 part)
        $criteria = new CDbCriteria();
        $criteria->addCondition('statusId = :status');
        $criteria->addCondition('DATE(ADDDATE(createdAt, INTERVAL :days DAY)) = :date');
        $criteria->params = [
            'status' => TouristStatus::WANT_DISCONT,
            'date' => $dateTime->format('Y-m-d'),
            'days' => ceil(Configuration::get(Configuration::ORDER_TOUR_TIMER) * 2 / 3)
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            Tool::informTourist($tourist, 'wait_discont_2');
            $waitDiscontReminder2++;
        }

        // Third notification (-2 days part)
        $criteria = new CDbCriteria();
        $criteria->addCondition('statusId = :status');
        $criteria->addCondition('DATE(ADDDATE(createdAt, INTERVAL :days DAY)) = :date');
        $criteria->params = [
            'status' => TouristStatus::WANT_DISCONT,
            'date' => $dateTime->format('Y-m-d'),
            'days' => Configuration::get(Configuration::ORDER_TOUR_TIMER) - 2
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            Tool::informTourist($tourist, 'wait_discont_3');
            $waitDiscontReminder3++;
        }

        // First notification (1/3 part) when timer is started by manager
        $criteria = new CDbCriteria();
        $criteria->addCondition('statusId = :status');
        $criteria->addCondition('DATE(ADDDATE(counterStartedAt, CEIL(TIMESTAMPDIFF(DAY, counterStartedAt, counterDate)/3))) = :date');
        $criteria->params = [
            'status' => TouristStatus::GETTING_DISCONT,
            'date' => $dateTime->format('Y-m-d'),
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            Tool::informTourist($tourist, 'notice_1');
            $gettingDiscontReminder1++;
        }

        // First notification (2/3 part) when timer is started by manager
        $criteria = new CDbCriteria();
        $criteria->addCondition('statusId = :status');
        $criteria->addCondition('DATE(ADDDATE(counterStartedAt, CEIL(TIMESTAMPDIFF(DAY, counterStartedAt, counterDate)*2/3))) = :date');
        $criteria->params = [
            'status' => TouristStatus::GETTING_DISCONT,
            'date' => $dateTime->format('Y-m-d'),
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            Tool::informTourist($tourist, 'notice_1');
            $gettingDiscontReminder1++;
        }

        // Second notification (4/9 part) when timer is started by manager
        $criteria = new CDbCriteria();
        $criteria->addCondition('statusId = :status');
        $criteria->addCondition('DATE(ADDDATE(counterStartedAt, CEIL(TIMESTAMPDIFF(DAY, counterStartedAt, counterDate)*4/9))) = :date');
        $criteria->params = [
            'status' => TouristStatus::GETTING_DISCONT,
            'date' => $dateTime->format('Y-m-d'),
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            Tool::informTourist($tourist, 'notice_2');
            $gettingDiscontReminder2++;
        }

        // Second notification (7/9 part) when timer is started by manager
        $criteria = new CDbCriteria();
        $criteria->addCondition('statusId = :status');
        $criteria->addCondition('DATE(ADDDATE(counterStartedAt, CEIL(TIMESTAMPDIFF(DAY, counterStartedAt, counterDate)*7/9))) = :date');
        $criteria->params = [
            'status' => TouristStatus::GETTING_DISCONT,
            'date' => $dateTime->format('Y-m-d'),
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            Tool::informTourist($tourist, 'notice_2');
            $gettingDiscontReminder2++;
        }

        // Third notification (5/9 part) when timer is started by manager
        $criteria = new CDbCriteria();
        $criteria->addCondition('statusId = :status');
        $criteria->addCondition('DATE(ADDDATE(counterStartedAt, CEIL(TIMESTAMPDIFF(DAY, counterStartedAt, counterDate)*5/9))) = :date');
        $criteria->params = [
            'status' => TouristStatus::GETTING_DISCONT,
            'date' => $dateTime->format('Y-m-d'),
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            Tool::informTourist($tourist, 'notice_3');
            $gettingDiscontReminder3++;
        }

        // Third notification (8/9 part) when timer is started by manager
        $criteria = new CDbCriteria();
        $criteria->addCondition('statusId = :status');
        $criteria->addCondition('DATE(ADDDATE(counterStartedAt, CEIL(TIMESTAMPDIFF(DAY, counterStartedAt, counterDate)*8/9))) = :date');
        $criteria->params = [
            'status' => TouristStatus::GETTING_DISCONT,
            'date' => $dateTime->format('Y-m-d'),
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            Tool::informTourist($tourist, 'notice_3');
            $gettingDiscontReminder3++;
        }

        // First notice after tour is finished
        $criteria = new CDbCriteria();
        $criteria->addCondition('statusId = :status');
        $criteria->addCondition('DATE(ADDDATE(tourFinishAt, INTERVAL 15 day)) = :date');
        $criteria->params = [
            'status' => TouristStatus::HAVE_DISCONT,
            'date' => $dateTime->format('Y-m-d'),
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            Tool::informTourist($tourist, 'after_tour_1');
            $afterTour1++;
        }

        // Second notice after tour is finished
        $criteria = new CDbCriteria();
        $criteria->addCondition('statusId = :status');
        $criteria->addCondition('DATE(ADDDATE(tourFinishAt, INTERVAL 30 day)) = :date');
        $criteria->params = [
            'status' => TouristStatus::HAVE_DISCONT,
            'date' => $dateTime->format('Y-m-d'),
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            self::sendEmailWithView($tourist->email, 'after_tour_2');
            $tourist->deleted = 1;
            $tourist->save();
            $afterTour2++;
        }

        print("Count of yesterday registered tourists: {$yesterdayRegistered}\n");
        print("Count of 1st notification for wait dicont tourist: {$waitDiscontReminder1}\n");
        print("Count of 2nd notification for wait dicont tourist: {$waitDiscontReminder2}\n");
        print("Count of 3rd notification for wait dicont tourist: {$waitDiscontReminder3}\n");
        print("Count of 1st notification for getting dicont tourist: {$gettingDiscontReminder1}\n");
        print("Count of 2nd notification for getting dicont tourist: {$gettingDiscontReminder2}\n");
        print("Count of 3rd notification for getting dicont tourist: {$gettingDiscontReminder3}\n");
        print("Count of 1st notification when tour is finished: {$afterTour1}\n");
        print("Count of 2nd notification when tour is finished and cabinet is deleted: {$afterTour2}\n");
        print("---------------------\n");
        print("\n");
    }
}