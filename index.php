<?php 
define('TOKEN','5382224630:AAHco47p1h3IxBoIhceU413bTE4wIs4Tg_o');

$url = 'https://api.telegram.org/bot'.TOKEN.'/';

$get_me = $url.'getme';

var_dump($get_me);