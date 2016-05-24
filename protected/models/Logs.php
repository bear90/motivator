<?php
/**
 * @author msoza@soxes.ch
 */

namespace application\models;

use application\components\DBEntity;

class Logs extends DBEntity {

    const STATUS_INFO = 'information';

    const STATUS_WARNING = 'warning';

    const STATUS_ERROR = 'error';


    public function rules(){
        return [
            ['text, createdAt, status, label', 'safe']
        ];
    }

    public function tableName()
    {
        return 'logs';
    }

    public static function prepareData($data = null)
    {
        switch (true) {
            case is_array($data):
                if ( 0 == count( $data ) ) {
                    $res = "ARRAY ()";
                } else {
                    $res = trim( var_export( $data, true ), PHP_EOL );
                }
                break;

            // Special case for Object
            case is_object( $data ):
                $res = trim( var_export( get_object_vars( $data ), true ), PHP_EOL );
                break;
            
            default:
                $res = $data;
                break;
        }

        return $res;
    }

    private function add($text, $status, $label)
    {
        $this->text = $text;
        $this->status = $status;
        $this->label = $label ?: $this->getUrl();
        $this->createdAt = new \CDbExpression("NOW()");

        $this->save();

        if($this->hasErrors()){
            throw new \Exception(\Tool::errorToString($this->errors));
        }
    }

    private function getUrl() {
        // Retrieve & Store URL
        if ( empty( $_SERVER['REQUEST_URI'] ) ) {
            $_SERVER['REQUEST_URI'] = get_called_class();
        }

        if ( isset( $_SERVER['REQUEST_URI'] ) ) {
            $iPos = strpos( $_SERVER['REQUEST_URI'], '?' );
            if ( $iPos > 0 ) {
                return substr( $_SERVER['REQUEST_URI'], 0, $iPos );
            } else {
                return $_SERVER['REQUEST_URI'];
            }
        }

        return null;
    }

    public static function info($text, $data = null, $label = '')
    {
        $entry = new self;

        $text = strval($text) . ' ' . self::prepareData($data);
        $entry->add($text, self::STATUS_INFO, $label);
    }

    public static function error($text, $data = null, $label = '')
    {
        $entry = new self;

        $text = strval($text) . ' ' . self::prepareData($data);
        $entry->add($text, self::STATUS_ERROR, $label);
    }

    public static function warning($text, $data = null, $label = '')
    {
        $entry = new self;

        $text = strval($text) . ' ' . self::prepareData($data);
        $entry->add($text, self::STATUS_WARNING, $label);
    }
}