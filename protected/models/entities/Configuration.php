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
    
    const PARAM_SENT_EMAIL_MESSAGE  = 'PARAM_SENT_EMAIL_MESSAGE';

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