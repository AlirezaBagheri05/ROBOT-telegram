<?php

class TelegramLib
{
    private static $url;

    public static function init(): void
    {
        self::$url = 'https://api.telegram.org/bot'.TOKEN.'/';
    }
    /** 
     * 
     * 
     * type : array or bool
     */
    private static function execute(string $_method,array $_parameters)
    {
        
        self::init();
        echo self::$url;
        if(!isset(self::$url)){
            return false;
        }

        $url = self::$url . $_method;
        $curl = curl_init($url);
        if(!empty($_parameters)){
            curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($_parameters));
        }
        curl_setopt($curl,CURLOPT_HTTPHEADER,['content-Type:application/json']); 
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        $update_result = curl_exec($curl);
        $error = null;
        if(curl_errno($curl)){
            $error = curl_errno($curl);
        }
        if(!is_null($error)){
            return false;
        }

        $output =  json_decode($update_result,true);
        if(is_null($output)){
            return false;
        }
        return $output;

    }

    public static function send_message(string $_text, string $_chat_id):array|bool
    {
        $parameters = [
            "text" => $_text,
            "chat_id" => $_chat_id
        ];
        return  self::execute('sendMessage',$parameters);
    }
    public static function get_update(int $offset = null):array|null
    {
        $parameters = [];
        if(!is_null($offset)){
            $parameters["offset"] = $offset;
        }
        $result = self::execute('getUpdates',$parameters);
        if(!is_array($result)){
            return $result['result'];
        }

    }
}