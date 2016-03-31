<?php
/**
 * @author mikhail.soza@soxes.ch
 */
namespace application\components;

class DbTransaction {

    private static $_transLevel = 0;
    private static $_transaction;

    public static function begin() {

        if (self::$_transLevel === 0)
            self::$_transaction = \Yii::app()->db->beginTransaction();

        self::$_transLevel++;
    }

    public static function commit() {

        self::$_transLevel--;

        if (self::$_transLevel < 0)
            self::$_transLevel = 0;

        if (self::$_transLevel === 0 && self::$_transaction instanceof \CDbTransaction) {
            self::$_transaction->commit();
            self::$_transaction = null;
        }
    }

    public static function rollBack() {

        self::$_transLevel--;

        if (self::$_transLevel < 0)
            self::$_transLevel = 0;

        if (self::$_transLevel === 0 && self::$_transaction instanceof \CDbTransaction) {
            self::$_transaction->rollBack();
            self::$_transaction = null;
        }
    }

}