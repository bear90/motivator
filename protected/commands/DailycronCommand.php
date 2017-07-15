<?php
/**
* This command class implement daily jobs
*/
use application\models\entities;
use application\models\Entity;
use application\models\entities\Configuration;


class DailycronCommand extends CConsoleCommand
{
    
    public function run($args)
    {

        $date = isset($args[0]) ? date('Y-m-d', strtotime($args[0])) : null;
        $dateTime = new DateTime($date);
        // General counters
        $firstNotification = 0;
        $secondNotification = 0;
        $lastNotification = 0;

        // First notification
        $criteria = new CDbCriteria();
        $criteria->addCondition('prolongationDate > 0 AND DATE(ADDDATE(prolongationDate, INTERVAL :days DAY)) = :date');
        $criteria->addCondition('prolongationDate IS NULL AND DATE(ADDDATE(createdAt, INTERVAL :days DAY)) = :date', 'OR');
        $criteria->params = [
            'date' => $dateTime->format('Y-m-d'),
            'days' => ceil(Configuration::get(Configuration::FIRST_NOTICE_TERM))
        ];
        foreach (entities\Task::model()->findAll($criteria) as $task) {
            \Tool::sendEmailWithLayout($task, 'first-notification');
            $firstNotification++;
        }

        // Second notification
        $criteria = new CDbCriteria();
        $criteria->addCondition('prolongationDate > 0 AND DATE(ADDDATE(prolongationDate, INTERVAL :days DAY)) = :date');
        $criteria->addCondition('prolongationDate IS NULL AND DATE(ADDDATE(createdAt, INTERVAL :days DAY)) = :date', 'OR');
        $criteria->params = [
            'date' => $dateTime->format('Y-m-d'),
            'days' => ceil(Configuration::get(Configuration::SECOND_NOTICE_TERM))
        ];
        foreach (entities\Task::model()->findAll($criteria) as $task) {
            \Tool::sendEmailWithLayout($task, 'second-notification');
            $secondNotification++;
        }

        // Last notification
        $criteria = new CDbCriteria();
        $criteria->addCondition('prolongationDate > 0 AND DATE(ADDDATE(prolongationDate, INTERVAL :days DAY)) = :date');
        $criteria->addCondition('prolongationDate IS NULL AND DATE(ADDDATE(createdAt, INTERVAL :days DAY)) = :date', 'OR');
        $criteria->params = [
            'date' => $dateTime->format('Y-m-d'),
            'days' => ceil(Configuration::get(Configuration::LAST_NOTICE_TERM))
        ];
        foreach (entities\Task::model()->findAll($criteria) as $task) {
            \Tool::sendEmailWithLayout($task, 'last-notification');
            $lastNotification++;
            $task->delete();
        }

        //$this->doBackup();

        print("Count of 1st notifications: {$firstNotification}\n");
        print("Count of 2nd notifications: {$secondNotification}\n");
        print("Count of last notifications with deletion: {$lastNotification}\n");
        print("---------------------\n");
        print("\n");
    }

    private function doBackup()
    {
        $folder = \Yii::app()->basePath . '/files/backups';
        $date = new DateTime();

        if (!file_exists($folder) && !mkdir($folder)) {
            return false;
        }


        $match = preg_match("/dbname=(\w+)/", \Yii::app()->db->connectionString, $row);
        $dbname = $row[1];
        $user = \Yii::app()->db->username;
        $pass = \Yii::app()->db->password;
        $path = $folder . "/{$dbname}_"  . $date->format('Ymd') . '.sql';

        if (file_exists($path))
        {
            return true;
        }

        $date->modify('-3 day');
        $deletePath = $folder . "/{$dbname}_"  . $date->format('Ymd') . '.sql';

        if (file_exists($deletePath))
        {
            unlink($deletePath);
        }

        $cmd = "mysqldump -u{$user} -p\"{$pass}\" {$dbname} > {$path}";
        exec($cmd);
    }
}