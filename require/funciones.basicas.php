<?php
/*
function webhook($data){
	if($data['object'] == 'page'){
		foreach ($data['entry'] as $entry) {
			$pageID = $entry['id'];
			$timeOfEvent = $entru['time'];

			// Iterate over each messaging event
			foreach ($entry['messaging'] as $event) {
				if($event['message']){
					receivedMessage($event);
				} else {
					// el evento no es reconocido, no se como avisarnos con php
				}
			}
		}
	}
}

function receivedMessage($event){
	$senderID = $event['sender']['id'];
  $recipientID = $event['recipient']['id'];
  $timeOfMessage = $event['timestamp'];
  $message = $event['message'];

  // Recolectando informacion del mensaje
  $messageId = $message['mid'];
  $messageText = $message['text'];
  $messageAttachments = $message['attachments'];

  if ($messageText) {
  	// If we receive a text message, check to see if it matches a keyword
    // and send back the example. Otherwise, just echo the text we received.
    switch ($messageText) {
      case 'generic':
        sendGenericMessage($senderID);
        break;

      default:
        sendTextMessage($senderID, $messageText);
    }
  } elseif($messageAttachments) {
  	sendTextMessage($senderID, "Message with attachment received");
  }
}

function sendGenericMessage($recipientId) {
  // To be expanded in later sections
}

function sendTextMessage($recipientId, $messageText) {

  $messageData = [
    'recipient' => [ 'id' => $recipientId ],
    'message' => [ 'text' => $messageText ]
	];

  callSendAPI($messageData);
}

function callSendAPI($messageData) {

	$accessToken = "EAAZADZAmPR0vQBABm5OuPJgG5vcB1Ua8a5YTsfJ9S44FSRRcmowV9V2xpduE9OLBX1WPc1G6ZAZAhxjaZAXeyYEjAuOipRxXjjkARQdFn3UnOjgJXYuBhuOTqd1E1SufrrU4f4p3UQslFkHch5ijXofVqEZCxgc9ZBYvOnnqZBZAV6QZDZD";

	$ch = curl_init('https://graph.facebook.com/v2.6/me/messages?access_token='.$accessToken);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messageData));
	curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
	$result = curl_exec($ch);
  if($result === FALSE) {
  	// No fue posible enviar el mensaje
    die(curl_error($ch));
	} else {
		// Se tuvo exito enviando el mensaje
		curl_close($ch);	
	}
}

*/
?>