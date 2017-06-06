<?php
/**
 * Some description
 *
 * @author      Mikhail Soza <msoza@soxes.ch>
 * @since       06.06.2017
 * @package
 * @copyright   Copyright (c) 2015-2017 soXes GmBh.
 *
 */

namespace application\models\entities;

class BaseEntity extends \CActiveRecord {

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
