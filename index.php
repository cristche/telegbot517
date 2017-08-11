<?php

/*
* This file is part of GeeksWeb Bot (GWB).
*
* GeeksWeb Bot (GWB) is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License version 3
* as published by the Free Software Foundation.
* 
* GeeksWeb Bot (GWB) is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.  <http://www.gnu.org/licenses/>
*
* Author(s):
*
* © 2015 Kasra Madadipouya <kasra@madadipouya.com>
*
*/
require 'vendor/autoload.php';

date_default_timezone_set("America/Caracas");

$client = new Zelenin\Telegram\Bot\Api('410216312:AAHOrXDU7x7knIhyhFy2AnE_s5UN_HW9J74'); // Set your access token
$url = ''; // URL RSS feed
$update = json_decode(file_get_contents('php://input'));



//your app
try {

    if($update->message->text'/email')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
        	'chat_id' => $update->message->chat->id,
        	'text' => "You can send email to : cristcheparedes@gmail.com"
     	]);
    }
    else if($update->message->text == '/help')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "List of commands :\n /email -> Get email address of the owner \n /today -> Get the date of today \n /help -> Shows list of available commands"
    		]);

    }
    else if($update->message->text == '/today')
    {
			$message = date("F j, Y, g:i a");
			$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
			$response = $client->sendMessage([
					'chat_id' => $update->message->chat->id,
					'text' => $message
				]);
    }
    else if(strlen($update->message->new_chat_participant->id) >0 && $update->message->new_chat_participant->id != 410216312)
    {
    	
        if (strlen($update->message->new_chat_participant->username) > 0 ){
            $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	    $response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "Welcome @".$update->message->new_chat_participant->username.". Bienvenido a  ".$update->message->chat->title.". El grupo es para compartir cosas en torno al desarrollo web, problemas con el curso, ofertas de empleo y pare de contar. Por lo general le preguntamos a las personas nuevas qué hacen, para conocernos y entrar en confianza...\nAsí que, cuéntanos (o no) ¿qué haces? ¿cómo te enteraste del grupo? y cuales son tus expectativas acá."
    		]);
        }
        else {
            $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
            $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "Welcome ".$update->message->new_chat_participant->first_name." ".$update->message->new_chat_participant->last_name.". Bienvenido a ".$update->message->chat->title.". El grupo es para compartir cosas en torno al desarrollo web, problemas con el curso, ofertas de empleo y pare de contar. Por lo general le preguntamos a las personas nuevas qué hacen, para conocernos y entrar en confianza...\nAsí que, cuéntanos (o no) ¿qué haces? ¿cómo te enteraste del grupo? y cuales son tus expectativas acá."
            ]);
        }
    }

} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}
