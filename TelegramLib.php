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
        $url = $url.'?text='.$_parameters['text'].'&'.'chat_id='.$_parameters['chat_id'];
        $curl = curl_init($url);
        $update_result = curl_exec($curl);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        // if(!empty($_parameters)){
        //     curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($_parameters));
        // }
        // curl_setopt($curl,CURLOPT_HEADER,['content-Type:application/json']); 

        // $update_result = curl_exec($curl);
        // $error = null;
        // if(curl_errno($curl)){
        //     $error = curl_errno($curl);
        // }
        // if(!is_null($error)){
        //     var_dump($error);
        //     return false;
        // }

        return json_decode($update_result,true);

    }

    public static function send_message(string $_text, string $_chat_id)
    {
        $parameters = [
            "text" => $_text,
            "chat_id" => $_chat_id
        ];
        return  self::execute('sendMessage',$parameters);
    }
}