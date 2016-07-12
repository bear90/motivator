<?php

    //namespace application\models;

    use application\models\Configuration;
    use application\models\Tour;
    use application\models\Tourist;
    use application\models\TouragentManager;
    use application\modules\admin\models\Template;

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
            //$message->view = $view;
            $text = self::fetchTemplate($view, $data);
            
            $message->setBody($text, 'text/html');
             
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

            $text = self::fetchTemplate($view, $data);
            /*$path = \Yii::getPathOfAlias("application.views.templates.{$view}") . '.php';
            if(file_exists($path))
            {
                $controller = isset(Yii::app()->controller)
                    ? \Yii::app()->controller
                    : new CController('YiiInform');

                $text = $controller->renderInternal($path, $data, true);
            }*/

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

        public static function fetchTemplate($name, array $data = [])
        {
            $content = Template::get($name);

            $placeholders = [
                '~SITE_DOMAIN~' => Configuration::get(Configuration::SITE_DOMAIN),
                '~MIN_DISCONT~' => Configuration::get(Configuration::MIN_DISCONT),
                '~MAX_DISCONT~' => Configuration::get(Configuration::MAX_DISCONT),
                '~PREPAYMENT~' => Configuration::get(Configuration::PREPAYMENT),
                '~ORDER_TOUR_TIMER~' => Configuration::get(Configuration::ORDER_TOUR_TIMER)
            ];

            $content = str_replace(array_keys($placeholders), array_values($placeholders), $content);

            switch ($name) {
                case 'registration':
                    $tourist = $data['tourist'];
                    $placeholders = [
                        '~cabinetNumber~' => str_pad($tourist->id, 4, "0", STR_PAD_LEFT),
                        '~password~' => $tourist->user->password,
                        '~autologinLink~' => $tourist->user->getAutoLoginLink(),
                    ];
                    $content = str_replace(array_keys($placeholders), array_values($placeholders), $content);
                    break;
                
                case 'exchange_tour_partner':
                    $child = $data['child'];
                    $placeholders = [
                        '~ChildLastName~' => $child->lastName,
                        '~ChildFirstName~' => $child->firstName,
                    ];
                    $content = str_replace(array_keys($placeholders), array_values($placeholders), $content);
                    break;
            }

            return $content;
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

        public static function getNewPriceText($value)
        {
            $value = round($value, 2);
            $rub = intval($value);
            $kop = round(($value - $rub) * 100);

            $str = '';
            if ($rub)
            {
                $str .= number_format($rub, 0, ',', ' ') . ' руб.';
            }
            $str .= " {$kop} коп.";

            return $str;
        }

        public static function getNewPrice($value)
        {
            return $value ? round($value, 2) : $value;
        }

        public static function calcCheckingDelta()
        {
            $tourists = Tourist::model()->with([
                'tour' => [
                    'joinType'=>'INNER JOIN',
                    //'condition'=>'posts.published=1',
                ]
            ])->findAll();
            $delta = 0;
            if (count($tourists)==0)
            {
                return $delta;
            }

            $prepayment = $totalPrice = $totalSurchange = 0;
            //dd($tourists);die();
            foreach ($tourists as $tourist) {

                $tour = $tourist->tour;

                $totalPrice += $tour->price;
                $surchange = $tour->getCurrentSurchange();
                $prepayment += $tour->prepayment;
                $totalSurchange += $surchange;
            }
            $totalSurchange += -1 * $tour->touragent->account + $prepayment;

            return round($totalSurchange / $totalPrice * 100, 3);
        }
    }