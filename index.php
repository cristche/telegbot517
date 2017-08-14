<?php

/*
* This file is part of Telegbot517.
*
* Telegbot517 is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License version 3
* as published by the Free Software Foundation.
* 
* Telegbot517 is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.  <http://www.gnu.org/licenses/>
*
* Author(s):
*
* © 2017 Cristche Paredes <cristcheparedes@gmail.com>
*
*/
require 'vendor/autoload.php';
date_default_timezone_set ("America/Caracas");
$client = new Zelenin\Telegram\Bot\Api('410216312:AAHOrXDU7x7knIhyhFy2AnE_s5UN_HW9J74'); // Set your access token
$update = json_decode(file_get_contents('php://input'));



//your app
try {

    if($update->message->text == '/email')
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
        
			$message = date('l jS \of F Y h:i:s A');
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
    		'text' => "Hello @".$update->message->new_chat_participant->username.". Welcome to  ".$update->message->chat->title.". Winter is coming, so tell us about yourself. How did you know about the group? What expectations do you have? What are your interests?."
    		]);
        }
        else {
            $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
            $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "Hello ".$update->message->new_chat_participant->first_name." ".$update->message->new_chat_participant->last_name.". Welkome to ".$update->message->chat->title.". Winter is coming, so tell us about yourself. How did you know about the group? What expectations do you have? What are your interests?."
            ]);
        }
    }

} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}
