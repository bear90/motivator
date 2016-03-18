<?php

/**
 * Class implementing default Database Entity functionality
 *
 */
namespace application\components;

class DBEntity extends \CActiveRecord {

    // Default table name to store data into
    protected $sTableName = null;

    /**
     * Overwritten
     *
     * @param   string  $sClassName
     *
     * @return  $this  Instance of correponding class
     */
    public static function model( $sClassName = null ) {
        // Define class name if not specified
        if ( null === $sClassName ) {
            $sClassName = get_called_class();
        }
        // Call preant with specific class name
        return parent::model( $sClassName );
    }

    public function tableName() {
        return $this->sTableName;
    }

    public function scopes()
    {
        return array(
            'options'=>array(
                'select' => 'id, name'
            )
        );
    }
}