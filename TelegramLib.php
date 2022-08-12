<?php

class TelegramLib
{
    private static $url;

    public static function init()
    {
        self::$url = 'https://api.telegram.org/bot'.TOKEN.'/';
        // https://api.telegram.org/bot5382224630:AAHco47p1h3IxBoIhceU413bTE4wIs4Tg_o
        // echo 'i am in init'.'<br>';
    }
    /** 
     * 
     * 
     * type : array or bool
     */
    private static function execute(string $_method,array $_parameters)
    {
        // echo 'i am in execute'.'<br>';
        
        if(!isset(self::$url)){
            self::init();
        }

        $url = self::$url . $_method;
        // echo $url.'<br>';
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
            echo 'it has error : '.$error.'<br>';
            return false;
        }

        $output =  json_decode($update_result,true);
        if(is_null($output)){
            // echo 'it it null :('.'<br>';
            return false;
        }
        
        return $output;

    }

    public static function send_message(string $_text, string $_chat_id)
    {
        $parameters = [
            "text" => $_text,
            "chat_id" => $_chat_id
        ];
        return  self::execute('sendMessage',$parameters);
    }
    public static function get_update(int $offset = null)
    {
        // echo 'i am in updates'.'<br>';
        $parameters = [];
        if(!is_null($offset)){
            $parameters["offset"] = $offset;
        }
        $result = self::execute('getUpdates',$parameters);
        if(is_array($result)){
            return $result['result'];
        }

    }
}