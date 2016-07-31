<?php
/**
* This command class implement daily jobs
*/
use application\models\defines\TouristStatus;
use application\models\Configuration;
use application\models\Tourist;

class MinutecronCommand extends CConsoleCommand
{
    
    public function run($args)
    {
        $touristDeleted = 0;

        // Get tourists for deletion
        $criteria = new CDbCriteria();
        $criteria->addCondition('statusId = :status');
        $criteria->addCondition('ADDDATE(createdAt, INTERVAL :days DAY) < NOW()');
        $criteria->params = [
            'status' => TouristStatus::WANT_DISCONT,
            'days' => Configuration::get(Configuration::ORDER_TOUR_TIMER)
        ];
        foreach (Tourist::model()->findAll($criteria) as $tourist) {
            Tool::sendEmailWithLayout($tourist, 'cabinet_deleted');
            $tourist->delete();
            $touristDeleted++;
        }

        print("Count of deleted tourists: {$touristDeleted}\n");
    }
}