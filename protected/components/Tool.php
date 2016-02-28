<?php
    class Tool {

        public static function errorToString($data, $sep = "\n") 
        {
            if (is_string($data)) {
                return $data;
            } else {
                $str = "";
                foreach ($data as $value) {
                    $str .= implode($sep, $value) . $sep;
                }

                return $str;
            }
        }

        public static function sendEmailWithView($to, $subject, $view, array $data = [])
        {
            Yii::import('application.extensions.yii-mail.YiiMailMessage');

            $message = new YiiMailMessage;
            $message->view = $view;
             
            //userModel is passed to the view
            $message->setBody($data, 'text/html');
             
            $message->addTo($to);
            $message->from = Yii::app()->params['adminEmail'];
            
            return Yii::app()->mail->send($message);
        }
    }