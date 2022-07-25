<?php 
define('TOKEN','5382224630:AAHco47p1h3IxBoIhceU413bTE4wIs4Tg_o');

$url = 'https://api.telegram.org/bot'.TOKEN.'/';

$get_me = $url.'getMe';
$get_updates = $url.'getUpdates';

$id_admin = '1288555225';

$saysth = $url.'sendMessage?text=hii&chat_id='.$id_admin;


// var_dump($get_me);
$curl = curl_init($get_updates);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
$update_result = curl_exec($curl);

$messages = json_decode($update_result,true);

$last_message_id = 0;

foreach($messages['result'] as $message){
    $text = $message['message']['text'];
    $chat_id = $message['message']['chat']['id'];
    $txt = 'thanks for saying : '.$text;
    $saysth = $url.'sendMessage?text='.$txt.'&chat_id='.$chat_id;
    $curl = curl_init($saysth);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    $update_result = curl_exec($curl);
}
// echo '<br/ >';
// var_dump($result);

