<?php
/**
* This command class implement daily jobs
*/
use application\models\entities;

class MinutecronCommand extends CConsoleCommand
{
    
    public function run($args)
    {
        $touristDeleted = 0;

        // Get tourists for deletion
        $criteria = new CDbCriteria();
        $criteria->addCondition('deleted = 0');
        $criteria->addCondition('expiredAt > 0 AND expiredAt < NOW()');

        $count = entities\Code::model()->deleteAll($criteria);

        print("Count of deleted codes: {$count}\n");
    }
}