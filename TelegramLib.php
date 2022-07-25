<?php

class TelegramLib
{
    private string $url;

    public static function init(): void
    {
        self::$url = 'https://api.telegram.org/bot'.TOKEN.'/';
    }

    private static function execute(string $_method,array $_parameters):array|bool
    {
        if(!isset(self::$url)){
            return false;
        }

        $url = self::$url . $_method;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        if(!empty($_parameters)){
            curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($_parameters));
        }
    }

}