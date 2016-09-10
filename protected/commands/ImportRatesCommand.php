<?php
/**
* This command class implement daily jobs
*/

use application\models\Currency;

class ImportRatesCommand extends CConsoleCommand
{
    private $date = null;

    private function getDate($format)
    {
        return $this->date->format($format);
    }

    private function setDate($dateString)
    { 
        $this->date = new DateTime();
        if($dateString)
        {
            $this->date = new DateTime($date);
        }
    }
    
    public function run($args)
    {
        $dateString = isset($args[0]) ? $args[0] : null;
        $this->setDate($dateString);

        $currencies = [
            'usd' => $this->getCurrentcy("//Currency[CharCode='USD']/Rate"),
            'eur' => $this->getCurrentcy("//Currency[CharCode='EUR']/Rate"),
        ];

        foreach ($currencies as $currency => $value) {
            $entity = Currency::get($currency);
            if(!isset($entity))
            {
                $entity = new Currency;
                $entity->key = $currency;
            }
            $entity->value = $value;
            $entity->updatedAt = new \CDbExpression('NOW()');
            $entity->save();
        }
    }

    private function getCurrentcy($xpath)
    {
        static $xml;

        if (!isset($xml))
        {
            $url = sprintf('http://www.nbrb.by/Services/XmlExRates.aspx?ondate=%s', $this->getDate('m/d/Y'));
            $xml = simplexml_load_file($url);

            if (!$xml)
                throw new Exception("Connect failed: {$url}");
        }
        
        $obj = $xml->xpath($xpath);

        return $obj[0];
    }
}