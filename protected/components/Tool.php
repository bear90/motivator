<?php

    //namespace application\models;

    use application\models\defines\TouristStatus;
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
            $sendingResult = self::sendEmailWithLayout($tourist, $view, $data);
            self::sendMessage($tourist, $view, $data);

            return $sendingResult;
        }

        public static function sendEmailWithView($to, $view, array $data = [])
        {
            $template = self::fetchTemplate($view, $data);

            \Yii::import('application.extensions.yii-mail.YiiMailMessage');

            $message = new YiiMailMessage;
            //$message->view = $view;
            $text = $template['content'];
            
            $message->setBody($text, 'text/html');
             
            $message->addTo($to);
            $message->setFrom(\Yii::app()->params['adminEmail'], 'Сервис «МОТИВАТОР»');
            $message->setSender(\Yii::app()->params['senderEmail']);
            $message->setSubject($template['subject']);
            
            return \Yii::app()->mail->send($message);
        }

        public static function sendEmailWithLayout(Tourist $tourist, $view, array $data = [])
        {
            $data['tourist'] = $tourist;
            $template = self::fetchTemplate($view, $data);

            \Yii::import('application.extensions.yii-mail.YiiMailMessage');

            $message = new YiiMailMessage;
            //$message->view = $view;
            $text = $template['content'];
            // render layout
            $path = \Yii::getPathOfAlias("application.views.templates.main") . '.php';
            if(file_exists($path))
            {
                $controller = isset(Yii::app()->controller)
                    ? \Yii::app()->controller
                    : new CController('YiiInform');

                $text = $controller->renderInternal($path, [
                    'tourist' => $tourist,
                    'content' => $template['content'],
                    'view' => $view
                ], true);
            }
            
            $message->setBody($text, 'text/html');
             
            $message->addTo($tourist->email);
            $message->setFrom(\Yii::app()->params['adminEmail'], 'Сервис «МОТИВАТОР»');
            $message->setSender(\Yii::app()->params['senderEmail']);
            $message->setSubject($template['subject']);
            
            return \Yii::app()->mail->send($message);
        }

        public static function sendMessage($entity, $view, array $data = [], $date = 'now')
        {
            if($entity instanceof Tourist === false && $entity instanceof TouragentManager === false)
            {
                return false;
            }

            $template = self::fetchTemplate($view, $data);
            $text = $template['content'];

            $message = new \application\models\Message;
            $message->createdAt = date('Y-m-d H:i:s', strtotime($date));
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
            $templateEntity = Template::get($name);
            $content = $templateEntity && $templateEntity->content? $templateEntity->content : '';
            $subject = $templateEntity && $templateEntity->subject? $templateEntity->subject : 'От системы «МОТИВАТОР»';

            $placeholders = [
                '~SITE_DOMAIN~' => Configuration::get(Configuration::SITE_DOMAIN),
                '~MIN_DISCONT~' => Configuration::get(Configuration::MIN_DISCONT),
                '~MAX_DISCONT~' => Configuration::get(Configuration::MAX_DISCONT),
                '~PREPAYMENT~' => Configuration::get(Configuration::PREPAYMENT),
                '~ORDER_TOUR_TIMER~' => Configuration::get(Configuration::ORDER_TOUR_TIMER)
            ];

            $content = str_replace(array_keys($placeholders), array_values($placeholders), $content);

            switch ($name) {
                
                case 'exchange_tour_partner':
                    $child = $data['child'];
                    $placeholders = [
                        '~ChildLastName~' => $child->lastName,
                        '~ChildFirstName~' => $child->firstName,
                    ];
                    $content = str_replace(array_keys($placeholders), array_values($placeholders), $content);
                    break;

                default:
                    
                    $placeholders = [];
                    
                    if (isset($data['tourist']))
                    {
                        $tourist = $data['tourist'];
                        $placeholders = [
                            '~cabinetNumber~' => str_pad($tourist->id, 4, "0", STR_PAD_LEFT),
                            '~autologinLink~' => $tourist->user->getAutoLoginLink(),
                        ];
                        if ($name == 'registration')
                        {
                            $placeholders['~password~'] = $tourist->user->password;
                        }
                    }
                    
                    $content = str_replace(array_keys($placeholders), array_values($placeholders), $content);
            }

            return [
                'content' => $content,
                'subject' => $subject,
            ];
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
            $html .= $_manager->name . ': ' . $_manager->description;

            return $html;
        }

        public static function getNewPriceText($value)
        {
            list($rub, $kop) = self::getNewPrice($value);

            $str = '';
            if ($rub)
            {
                $str .= number_format($rub, 0, ',', ' ') . ' руб.';
            }
            $str .= " {$kop} коп.";

            return $str;
        }

        public static function getNewPriceText2($value)
        {
            list($rub, $kop) = self::getNewPrice($value);
            
            $str = '';
            if ($rub)
            {
                $str .= number_format($rub, 0, ',', ' ') . ' <small>руб.</small>';
            }
            $str .= " {$kop} <small>коп.</small>";

            return $str;
        }

        public static function getNewPrice($value)
        {
            $value = round($value, 2);
            $rub = intval($value);
            $kop = round(($value - $rub) * 100);

            return [$rub, $kop];
        }

        public static function calcCheckingDelta($touragentId = null)
        {
            $criteria = new \CDbCriteria();
            $criteria->with = [
                'tour' => [
                    'joinType'=>'INNER JOIN',
                    //'condition'=>'posts.published=1',
                ]
            ];

            if ($touragentId !== null)
            {
                $criteria->with['tour']['on'] = 'tour.touragentId = :touragentId';
                $criteria->params['touragentId'] = $touragentId;
            }

            //$criteria->limit = 4;
            $criteria->order = 't.id DESC';
            /*$criteria->condition = 't.statusId IN (:stGettingDiscount, :stHaveDiscount)';
            $criteria->params['stGettingDiscount'] = TouristStatus::GETTING_DISCONT;
            $criteria->params['stHaveDiscount'] = TouristStatus::HAVE_DISCONT;*/

            $tourists = Tourist::model()->findAll($criteria);
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

        public static function copyFolder($src, $dst) { 
            $dir = opendir($src); 
            @mkdir($dst); 
            while(false !== ( $file = readdir($dir)) ) { 
                if (( $file != '.' ) && ( $file != '..' )) { 
                    if ( is_dir($src . '/' . $file) ) { 
                        self::copyFolder($src . '/' . $file,$dst . '/' . $file); 
                    } 
                    else { 
                        copy($src . '/' . $file,$dst . '/' . $file); 
                    } 
                } 
            } 
            closedir($dir); 
        }

        public static function deleteFolder($dir) {
            if (is_dir($dir)) { 
                $objects = scandir($dir); 
                foreach ($objects as $object) { 
                    if ($object != "." && $object != "..") { 
                        if (is_dir($dir."/".$object))
                            self::deleteFolder($dir."/".$object);
                        else
                            unlink($dir."/".$object); 
                    } 
                }
                rmdir($dir); 
            }
        }

        public static function zipFolder($source, $destination)
        {
            if (!extension_loaded('zip') || !file_exists($source)) {
                return false;
            }

            $zip = new \ZipArchive();
            if (!$zip->open($destination, \ZIPARCHIVE::CREATE)) {
                return false;
            }

            $source = str_replace('\\', '/', realpath($source));

            if (is_dir($source) === true)
            {
                $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($source), \RecursiveIteratorIterator::SELF_FIRST);

                foreach ($files as $file)
                {
                    $file = str_replace('\\', '/', $file);

                    // Ignore "." and ".." folders
                    if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
                        continue;

                    $file = realpath($file);
                    $file = str_replace('\\', '/', $file);

                    if (is_dir($file) === true)
                    {
                        $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                    }
                    else if (is_file($file) === true)
                    {
                        $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                    }
                }
            }
            else if (is_file($source) === true)
            {
                $zip->addFromString(basename($source), file_get_contents($source));
            }

            return $zip->close();
        }

        public static function num2str($num, $money = true) {
            $nul='ноль';
            $ten=array(
                array('','один','два','три','четыре','пять','шесть','семь', 'восемь','девять'),
                array('','одна','две','три','четыре','пять','шесть','семь', 'восемь','девять'),
            );
            $a20=array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать' ,'пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать');
            $tens=array(2=>'двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят' ,'восемьдесят','девяносто');
            $hundred=array('','сто','двести','триста','четыреста','пятьсот','шестьсот', 'семьсот','восемьсот','девятьсот');
            $unit=array( // Units
                array('копейка' ,'копейки' ,'копеек',    1),
                array('рубль'   ,'рубля'   ,'рублей'    ,0),
                array('тысяча'  ,'тысячи'  ,'тысяч'     ,1),
                array('миллион' ,'миллиона','миллионов' ,0),
                array('миллиард','милиарда','миллиардов',0),
            );
            //
            list($rub,$kop) = explode('.',sprintf("%015.2f", floatval($num)));
            $out = array();
            if (intval($rub)>0) {
                foreach(str_split($rub,3) as $uk=>$v) { // by 3 symbols
                    if (!intval($v)) continue;
                    $uk = sizeof($unit)-$uk-1; // unit key
                    $gender = $unit[$uk][3];
                    list($i1,$i2,$i3) = array_map('intval',str_split($v,1));
                    // mega-logic
                    $out[] = $hundred[$i1]; # 1xx-9xx
                    if ($i2>1) $out[]= $tens[$i2].' '.$ten[$gender][$i3]; # 20-99
                    else $out[]= $i2>0 ? $a20[$i3] : $ten[$gender][$i3]; # 10-19 | 1-9
                    // units without rub & kop
                    if ($uk>1) $out[]= self::morph($v,$unit[$uk][0],$unit[$uk][1],$unit[$uk][2]);
                } //foreach
            }
            else $out[] = $nul;

            if ($money)
            {
                $out[] = self::morph(intval($rub), $unit[1][0],$unit[1][1],$unit[1][2]); // rub
                //$out[] = $kop.' '.self::morph($kop,$unit[0][0],$unit[0][1],$unit[0][2]); // kop
            }
            
            return trim(preg_replace('/ {2,}/', ' ', join(' ',$out)));
        }

        /**
         * Склоняем словоформу
         */
        private static function morph($n, $f1, $f2, $f5) {
            $n = abs(intval($n)) % 100;
            if ($n>10 && $n<20) return $f5;
            $n = $n % 10;
            if ($n>1 && $n<5) return $f2;
            if ($n==1) return $f1;
            return $f5;
        }

        public static function getCurrencyList($key = null)
        {
            $data = ['byn' => 'Белорусские рубли', 'usd' => 'Доллары', 'eur' => 'Евро'];

            return $key ? $data[$key] : $data;
        }
    }