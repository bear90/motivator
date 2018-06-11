<?php

/**
 * Class implementing Configuration functionality
 */
namespace application\models\entities;

class Configuration extends BaseEntity {

    const KEY_LENGTH    = 64;

    const TYPE_STR  = 'string';

    const TYPE_INT  = 'integer';

    const TYPE_ARRAY  = 'array';

    const TYPE_FLOAT  = 'float';

    const SITE_DOMAIN = 'SITE_DOMAIN';
    
    const FIRST_NOTICE_TERM  = 'FIRST_NOTICE_TERM';
    
    const SECOND_NOTICE_TERM  = 'SECOND_NOTICE_TERM';
    
    const LAST_NOTICE_TERM  = 'LAST_NOTICE_TERM';
    
    const TASK_PROLONG_TERM  = 'TASK_PROLONG_TERM';

    const CODE_LIVE_TIME  = 'CODE_LIVE_TIME';

    const CODE_PHONE_LIVE_TIME  = 'CODE_PHONE_LIVE_TIME';
    
    const TASK_DESCRIPTION_HELP  = 'TASK_DESCRIPTION_HELP';

    const SLIDE_SHOWING_TIME_1  = 'SLIDE_SHOWING_TIME_1';
    const SLIDE_SHOWING_TIME_2  = 'SLIDE_SHOWING_TIME_2';
    const SLIDE_SHOWING_TIME_3  = 'SLIDE_SHOWING_TIME_3';
    const SLIDE_SHOWING_TIME_4  = 'SLIDE_SHOWING_TIME_4';
    const SLIDE_SHOWING_TIME_5  = 'SLIDE_SHOWING_TIME_5';
    const SLIDE_SHOWING_TIME_6  = 'SLIDE_SHOWING_TIME_6';
    const SLIDE_SHOWING_TIME_7  = 'SLIDE_SHOWING_TIME_7';
    const SLIDE_SHOWING_TIME_8  = 'SLIDE_SHOWING_TIME_8';
    const SLIDE_SHOWING_TIME_9  = 'SLIDE_SHOWING_TIME_9';
    const SLIDE_SHOWING_TIME_10  = 'SLIDE_SHOWING_TIME_10';
    const SLIDE_SHOWING_TIME_11  = 'SLIDE_SHOWING_TIME_11';
    const SLIDE_SHOWING_TIME_12  = 'SLIDE_SHOWING_TIME_12';
    const SLIDE_SHOWING_TIME_13  = 'SLIDE_SHOWING_TIME_13';
    const SLIDE_SHOWING_TIME_14  = 'SLIDE_SHOWING_TIME_14';
    const SLIDE_SHOWING_TIME_15  = 'SLIDE_SHOWING_TIME_15';
    const SLIDE_SHOWING_TIME_16  = 'SLIDE_SHOWING_TIME_16';
    const SLIDE_SHOWING_TIME_17  = 'SLIDE_SHOWING_TIME_17';
    const SLIDE_SHOWING_TIME_18  = 'SLIDE_SHOWING_TIME_18';
    const SLIDE_SHOWING_TIME_19  = 'SLIDE_SHOWING_TIME_19';
    const SLIDE_SHOWING_TIME_20  = 'SLIDE_SHOWING_TIME_20';
    const SLIDE_SHOWING_TIME_21  = 'SLIDE_SHOWING_TIME_21';
    const SLIDE_SHOWING_TIME_22  = 'SLIDE_SHOWING_TIME_22';
    const SLIDE_SHOWING_TIME_23  = 'SLIDE_SHOWING_TIME_23';
    const SLIDE_SHOWING_TIME_24  = 'SLIDE_SHOWING_TIME_24';
    const SLIDE_SHOWING_TIME_25  = 'SLIDE_SHOWING_TIME_25';
    const SLIDE_SHOWING_TIME_26  = 'SLIDE_SHOWING_TIME_26';
    const SLIDE_SHOWING_TIME_27  = 'SLIDE_SHOWING_TIME_27';
    const SLIDE_SHOWING_TIME_28  = 'SLIDE_SHOWING_TIME_28';
    const SLIDE_SHOWING_TIME_29  = 'SLIDE_SHOWING_TIME_29';
    const SLIDE_SHOWING_TIME_30  = 'SLIDE_SHOWING_TIME_30';
    const SLIDE_SHOWING_TIME_31  = 'SLIDE_SHOWING_TIME_31';
    const SLIDE_SHOWING_TIME_32  = 'SLIDE_SHOWING_TIME_32';
    const SLIDE_SHOWING_TIME_33  = 'SLIDE_SHOWING_TIME_33';
    const SLIDE_SHOWING_TIME_34  = 'SLIDE_SHOWING_TIME_34';
    const SLIDE_SHOWING_TIME_35  = 'SLIDE_SHOWING_TIME_35';
    const SLIDE_SHOWING_TIME_36  = 'SLIDE_SHOWING_TIME_36';
    const SLIDE_SHOWING_TIME_37  = 'SLIDE_SHOWING_TIME_37';
    const SLIDE_SHOWING_TIME_38  = 'SLIDE_SHOWING_TIME_38';
    const SLIDE_SHOWING_TIME_39  = 'SLIDE_SHOWING_TIME_39';
    const SLIDE_SHOWING_TIME_40  = 'SLIDE_SHOWING_TIME_40';

    private static $aValues = null;

    /**
     * Converts string value to specified type value (defualt string)
     *
     * @param   string  $sValue String value to be converted
     * @param   string  $sType  Type name
     *
     * @return  mixed   value of speciifed type
     */
    private static function convertValue( $sValue, $sType = self::TYPE_STR ) {

        $mValue = (string) $sValue;

        switch ( $sType ) {

            case self::TYPE_INT:
                $mValue = (int) $sValue;
                break;

            case self::TYPE_FLOAT:
                $mValue = (float) $sValue;
                break;

            case self::TYPE_ARRAY:
                $mValue = json_decode($sValue, true);
                break;

        }

        return $mValue;
    }

    /**
     * Returns configuration value for specified Key verifying its type
     *
     * @param   string  $sKeyName   Key Name of configuration value to be returned
     * @param   mixed   $mDefault   Default value to be returned if NOT found
     *
     * @return  mixed   Configuration value
     */
    public static function get( $sKeyName, $mDefault = null, $bReload = false ) {

        if ( null === self::$aValues ) {
            self::$aValues = array();
            // create instance and load all configuration values
            $aRs = self::model()->findAll();

            foreach ($aRs as $aRow ) {

                $mValue= self::convertValue( $aRow[ 'value' ], $aRow[ 'type' ] );
                self::$aValues[ $aRow[ 'name' ] ] = $mValue;

            }
            // It's not necessary to reload anymore
            $bReload = false;
        }

        if ( $bReload )
        {
            $oConfig = self::model()->findByAttributes( array( 'name' => $sKeyName ) );
            if ( $oConfig !== null && $oConfig->id > 0 )
            {
                self::$aValues[ $sKeyName ] = self::convertValue( $oConfig->value, $oConfig->type );
            }
        }

        if ( isset( self::$aValues[ $sKeyName ] ) ) {
            return self::$aValues[ $sKeyName ];
        }

        return $mDefault;

    }

    /**
     * Sets configuration value (updating existed or creating new)
     * and store it in database if requires
     *
     * @param   string  $sKeyName   Configuration key name
     * @param   mixed   $mValue     Value to be set
     * @param   string  $sType      Type of configuration value (Configuration::TYPE_*))
     * @param   boolean $bStore     Flag indicating weather if value should be stored in DB
     *
     * @return  void
     */
    public static function set ( $sKeyName, $mValue, $sType = self::TYPE_INT, $bStore = true ) {
        // Update value in internal arrays as well
        self::$aValues[ $sKeyName ] = self::convertValue( $mValue, $sType );
        // If should NOt be stored in Database => exit
        if ( !$bStore ) {
            return;
        }
        // Try to find value in database by key
        $oConfig = Configuration::model()->findByAttributes( array( 'name' => $sKeyName ) );
        // Create new if NOT found
        if ( null == $oConfig || 0 == $oConfig->id ) {
            $oConfig = new Configuration();
        }
        // Save new or updated existed configuration value
        $oConfig->name  = $sKeyName;
        $oConfig->type  = $sType;
        $oConfig->value = $mValue;
        $oConfig->save();
    }

    public function tableName()
    {
        return 'tbl_configuration';
    }
}