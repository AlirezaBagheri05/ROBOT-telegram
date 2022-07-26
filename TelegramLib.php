<?php

class TelegramLib
{
    private string $url;

    public static function init(): void
    {
        self::$url = 'https://api.telegram.org/bot'.TOKEN.'/';
    }
    /** 
     * 
     * 
     * type : array or bool
     */
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
        curl_setopt($curl,CURLOPT_HEADER,['content-Type:application/json']); 

        $update_result = curl_exec($curl);
        $error = null;
        if(curl_errno($curl)){
            $error = curl_errno($curl);
        }
        if(!is_null($error)){
            return false;
        }

        return json_decode($result,true);

    }

    public static function send_message(string $_text, string $_chat_id):array|bool
    {
        $parameters = [
            "text" = $_text,
            "chat_id" = $_chat_id
        ];
        return  self::execute('sendMessage',$parameters,);
    }
}