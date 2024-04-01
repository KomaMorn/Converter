<?php

namespace App\Models;

class CBclient
{
    public const XML = 'http://www.cbr.ru/scripts/XML_daily.asp';
    public $xmlObject;

    /**
     * Конструктор парсит xml-файл и заполняет поле $xmlObject
     */
    public function __construct()
    {
        $cacheTimeOut = 3600;
        $fileCache = BASE_DIR . '/data/currency.xml';

        if (!is_file($fileCache) || filemtime($fileCache) < (time() - $cacheTimeOut)) {
            $ch = curl_init(self::XML);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $data = curl_exec($ch);
            curl_close($ch);

            $xml = iconv('windows-1251', 'UTF-8', $data);
            file_put_contents($fileCache, $xml);
        }

        $this->xmlObject = simplexml_load_file($fileCache);
    }

    /**
     * Метод возвращает массив объектов валют
     * @return array
     */
    public function getValuteObject() : array
    {   
        $result = [];

        foreach ($this->xmlObject->Valute as $valute) {
            $result[] = $valute;
        }

        return $result;
    }
}