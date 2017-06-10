<?php

/**
 * General functions to be used everywhere
 */
namespace application\models;

class Tools
{
    public static function errorsToString($errors, $separator = '<br>')
    {
        $msg = '';
        if (is_array($errors)) {
            foreach ($errors as $error) {
                $msg .= implode(", ", array_values($error)) . $separator;
            }
        } else {
            $msg .= $errors;
        }

        return $msg;
    }
}
