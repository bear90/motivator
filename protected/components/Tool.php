<?php

    //namespace application\models;

    use application\models\Tour;
    use application\models\Tourist;
    use application\models\TouragentManager;

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

        public static function informTourist(Tourist $tourist, $view)
        {
            $subject = '';
            $subjPath = \Yii::getPathOfAlias("application.views.mail.{$view}_subj") . '.php';
            if(file_exists($subjPath))
            {
                if(isset(Yii::app()->controller))
                    $controller = Yii::app()->controller;
                else
                    $controller = new CController('YiiInform');

                $subject = $controller->renderInternal($subjPath, [], true);
            }

            self::sendEmailWithView($tourist->email, $subject, $view, ['tourist' => $tourist]);
        }

        public static function sendEmailWithView($to, $subject = 'От системы «МОТИВАТОР»', $view, array $data = [])
        {
            Yii::import('application.extensions.yii-mail.YiiMailMessage');

            $message = new YiiMailMessage;
            $message->view = $view;
            
            $message->setBody($data, 'text/html');
             
            $message->addTo($to);
            $message->from = Yii::app()->params['adminEmail'];
            $message->setSubject($subject);
            
            return Yii::app()->mail->send($message);
        }

        public static function getManagerContacts(Tour $tour, TouragentManager $manager = null)
        {
            $_manager = $manager;
            if($tour->managerId)
            {
                $_manager = TouragentManager::model()->findByPk($tour->managerId);
            }
            $touragent = $_manager->touragent;

            $html = '';
            $html .= $touragent->name . ' ';
            $html .= '<a href="' . $touragent->getSiteLink() . '" target="_blank">' . $touragent->getSiteName() . '</a>';
            $html .= '<br>';
            $html .= $_manager->name . ': ' . $_manager->getPhones();

            return $html;
        }   
    }