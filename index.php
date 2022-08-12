<?php 

include __DIR__.'/env.php';
include __DIR__.'/TelegramLib.php';

//  TelegramLib::send_message('saaalaaam','1288555225');
// echo "gozo<br>";
// $url = 'https://api.telegram.org/..../';
// $get_me = $url.'getMe';
// $id_admin = '1288555225';
// $saysth = $url.'sendMessage?text=hii&chat_id='.$id_admin;
// var_dump($get_me);



// $get_updates = $url.'getUpdates';

// $curl = curl_init($get_updates);
// curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
// $update_result = curl_exec($curl);
// echo curl_errno($curl);

// $messages = json_decode($update_result,true);
// print_r($messages);

// ------

$messages = TelegramLib::get_update();
var_dump($messages);

foreach($messages as $message){
    $text = $message['message']['text'];
    if(is_null($text)){
        $text = 'oh ok';
    }
    $chat_id = $message['message']['chat']['id'];
    $txt = 'thanks for saying : '.$text;

    TelegramLib::send_message($text,$chat_id);

    $last_messages_id = $message['update_id'];
}

$messages = TelegramLib::get_update($last_messages_id+1);


















// if($result)
//     echo 'true';
// else
//     echo 'false'


// $url = 'https://api.telegram.org/bot'.TOKEN.'/';

// $file = fopen(update_id, 'r');
// $last_message_id = fread($file,filesize(update_id));
// $ofset = $url.'getUpdates?offset='.$last_message_id;
// var_dump($ofset);
// $curl = curl_init($ofset);
// curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
// $update_result = curl_exec($curl);
// fclose($file);

// // $get_me = $url.'getMe';
// // $id_admin = '1288555225';
// // $saysth = $url.'sendMessage?text=hii&chat_id='.$id_admin;
// // var_dump($get_me);

// $get_updates = $url.'getUpdates';

// $curl = curl_init($get_updates);
// curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
// $update_result = curl_exec($curl);

// $messages = json_decode($update_result,true);


// foreach($messages['result'] as $message){
//     $text = $message['message']['text'];
//     $chat_id = $message['message']['chat']['id'];
//     $txt = 'thanks for saying : '.$text;
//     $saysth = $url.'sendMessage?text='.$txt.'&chat_id='.$chat_id;
//     $curl = curl_init($saysth);
//     curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
//     $update_result = curl_exec($curl);

//     $last_messages_id = $message['update_id'];
// }
// if(!empty($last_messages_id)){

// $file = fopen(update_id, 'w');

// fwrite($file,$last_messages_id+1);

// fclose($file);

// }

// echo '<br/ >';
// var_dump($result);

// {"ok":true,
//     "result":[
//     {
//     "update_id":323911505,
//     "message":{
//         "message_id":1,
//         "from":{
//             "id":1288555225,
//             "is_bot":false,
//             "first_name":"~",
//             "username":"Suunof2025",
//             "language_code":"en"
//         },
//         "chat":{
//             "id":1288555225,
//             "first_name":"~",
//             "username":"Suunof2025",
//             "type":"private"},
//             "date":1659212323,
//             "text":"/start",
//             "entities":[{
//                 "offset":0,
//                 "length":6,
//                 "type":"bot_command"}
//                 ]
//             }
//         },
//         {
//         "update_id":323911506,
//         "message":{
//             "message_id":5,
//             "from":{
//                 "id":1288555225,
//                 "is_bot":false,
//                 "first_name":"~",
//                 "username":"Suunof2025",
//                 "language_code":"en"
//             },
//                 "chat":{
//                     "id":1288555225,
//                     "first_name":"~",
//                     "username":"Suunof2025",
//                     "type":"private"
//                 },
//                 "date":1659260954,
//                 "text":"ok"
//             }
//         }
//         ]
//     }