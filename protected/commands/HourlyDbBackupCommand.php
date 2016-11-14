<?php

/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       14.11.2016
 * @package
 * @copyright   Copyright (c) 2015-2016 soXes GmBh.
 *
 */
class HourlyDbBackupCommand extends CConsoleCommand
{
    public function run($args)
    {
        $this->doBackup();
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
        $path = $folder . "/{$dbname}_"  . $date->format('Ymd_H00') . '.sql';

        if (file_exists($path))
        {
            return true;
        }

        $date->modify('-1 day');
        $deletePath = $folder . "/{$dbname}_"  . $date->format('Ymd_H00') . '.sql';

        if (file_exists($deletePath))
        {
            unlink($deletePath);
        }

        $cmd = "mysqldump -u{$user} -p\"{$pass}\" {$dbname} > {$path}";
        exec($cmd);
    }
}