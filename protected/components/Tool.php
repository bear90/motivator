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

        public static function informTourist(Tourist $tourist, $view, array $data = [])
        {
            $data['tourist'] = $tourist;
            $r = self::sendEmailWithView($tourist->email, $view, $data);
            self::sendMessage($tourist, $view, $data);
        }

        public static function sendEmailWithView($to, $view, array $data = [])
        {
            $subject = 'От системы «МОТИВАТОР»';
            $subjPath = \Yii::getPathOfAlias("application.views.templates.{$view}_subj") . '.php';
            if(file_exists($subjPath))
            {
                $controller = isset(\Yii::app()->controller)
                    ? \Yii::app()->controller
                    : new CController('YiiInform');

                $subject = trim($controller->renderInternal($subjPath, $data, true));
            }

            \Yii::import('application.extensions.yii-mail.YiiMailMessage');

            $message = new YiiMailMessage;
            $message->view = $view;
            
            $message->setBody($data, 'text/html');
             
            $message->addTo($to);
            $message->from = \Yii::app()->params['adminEmail'];
            $message->setSender(\Yii::app()->params['senderEmail']);
            $message->setSubject($subject);
            
            return \Yii::app()->mail->send($message);
        }

        public static function sendMessage($entity, $view, array $data = [], $date = 'now')
        {
            if($entity instanceof Tourist === false && $entity instanceof TouragentManager === false)
            {
                return false;
            }

            $text = '';
            $path = \Yii::getPathOfAlias("application.views.templates.{$view}") . '.php';
            if(file_exists($path))
            {
                $controller = isset(Yii::app()->controller)
                    ? \Yii::app()->controller
                    : new CController('YiiInform');

                $text = $controller->renderInternal($path, $data, true);
            }

            $message = new \application\models\Message;
            $message->createdAt = date('Y-m-d', strtotime($date));
            $message->text = $text;

            if($entity instanceof Tourist)
            {
                $message->touristId = $entity->id;
            } else if ($entity instanceof TouragentManager)
            {
                $message->managerId = $entity->id;
            }
            $message->save();

            if($message->hasErrors()){
                throw new \Exception(self::errorToString($message->errors));
            }

            return $message;
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