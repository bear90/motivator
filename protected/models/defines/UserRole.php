<?php

    namespace application\models\defines;

    class UserRole {

        const USER = 1;

        const MANAGER = 2;
        
        const ADMIN = 3;

        public static function getList() {
            return [self::USER, self::MANAGER, self::ADMIN];
        }
    }